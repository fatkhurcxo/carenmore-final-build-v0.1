<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Exists;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class OtentikasiController extends Controller
{
    // All the code of login and register by Ojak

    /* REGISTER */
    public function regView(): View
    {
        return view('homepage.register');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:64|',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $createUser = User::create(
            [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );

        if ($createUser->exists) {
            # code...
            /* send email verification */
            // event(new Registered($createUser));
            Auth::login($createUser);

            return redirect()->route('provider.new');
        }
    }

    public function regWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function regWithGoogleHandle()
    {
        try{
            $userData = Socialite::driver('google')->user();
            /* Check used email register */
            $usedEmail = User::firstWhere('email', $userData->email);
            if ($usedEmail) {
                # code...
                $admin = Admin::firstWhere('user_id', $usedEmail->id);
                if(!$admin){
                    Auth::login($usedEmail);
                    Session::regenerate();
                    /* Redirect to Provider Page */
                    return redirect()->intended('/provider');
                }
                Auth::login($usedEmail);
                Session::regenerate();

                return redirect()->intended('/admin');
                // return redirect()->route('register')->withErrors(['usedEmail' => 'Akun google anda telah terdaftar, mohon gunakan akun lain']);
            }
            if (!empty($userData)) {
                # code...
                return redirect()->route('guest.register')->with(['regWithGoogle' => 'Lengkapi kata sandi anda.', 'email' => $userData->email, 'name' => $userData->name]);
            }else{
                return redirect()->route('guest.login');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    /* END REGISTER */

    /* LOGIN */
    public function logView(): View
    {
        // dd(Session::all());
        return view('homepage.login');
    }

    public function authLogin(Request $request)
    {
        $pengenal = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt($pengenal, $remember_me)) {
            # code...
            $request->session()->regenerate();

            if ($remember_me == true) {
                # code...
                session(['email' => $request->email, 'password' => $request->password]);
            }else{
                $request->session()->forget(['email', 'password']);
            }
            $usedEmail = User::firstWhere('email', $request->email);
            $admin = Admin::firstWhere('user_id', $usedEmail->id);
            /* If Data Admin not Found */
            if(!$admin){
                return Redirect::intended('/provider');
            }

            return Redirect::intended('/admin');
        }

        return back()->withErrors(['loginGagal' => 'Email atau password anda tidak sesuai, mohon periksa kembali!']);
    }

    /* END LOGIN */

    /* LOGOUT */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        if(session('email', 'password'))
        {
            $request->session()->regenerateToken();
            return redirect()->route('guest.home');
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('guest.home');
    }
}
