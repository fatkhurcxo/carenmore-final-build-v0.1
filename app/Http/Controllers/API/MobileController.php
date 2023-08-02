<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Layanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class MobileController extends Controller
{
    public function sendOneUser(){
        return Response::json([
            'data' => User::where('id', 1)->get()
        ]);
    }
    public function createUser(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $creating = User::create($data);

        if($creating->exists)
        {
            $generateCust = Customer::create([
                'user_id' => $creating->id,
                'alamat_id' => 175,
                'nama' => $creating->name,
                'coin' => 0,
                'status' => 'aktif'
            ]);

            if($generateCust->exists)
            {
                return Response::json([
                    'create' => true,
                    'message' => "account successfully created"
                    // 'data' => $creating
                ]);
            }

        }else {
            return Response::json([
                'create' => false,
                'message' => "fail to create an account!"
                // 'data' => $creating
            ]);
        }

    }

    public function authUser(Request $request)
    {
        $data = $request->input();

        $accountExist = User::firstWhere('email', $data['email']);

        if($accountExist != null)
        {
            $matchPassword = Hash::check($data['password'], $accountExist->password);
            if($matchPassword)
            {
                return Response::json([
                    'login' => true,
                    "message" => "success",
                    "user_id" => $accountExist->id
                ],
            200);
            }else{
                return Response::json([
                    'login' => false,
                    'message' => 'password doesn\'t match!',
                    'user_id' => $accountExist->id
                ]);
            }
        }else{
            return Response::json([
                'login' => false,
                'message' => "fail",
                'user_id' => null
            ]);
        }
    }

    public function userDetail($userId)
    {
        $isExist = Customer::firstWhere('user_id', $userId);

        if($isExist != null)
        {
            return Response::json([
                'message' => "success by user_id",
                'alamat' => $isExist->alamat->jalan . ', ' . $isExist->alamat->rtrw . ', ' . $isExist->alamat->desa,
                'nama' => $isExist->nama,
                'coin' => $isExist->coin,
                'status' => $isExist->status,
                'id' => $isExist->id
            ]);
        }else{
            $customerById = Customer::find($userId);

            if($customerById->exists)
            {
                return Response::json([
                    'message' => 'success by id',
                    'alamat' => $customerById->alamat->jalan. ', ' . $customerById->alamat->rtrw. ', ' . $customerById->alamat->desa,
                    'nama' => $customerById->nama,
                    'coin' => $customerById->coin,
                    'status' => $customerById->status,
                    'id' => $customerById->id
                ]);
            }else{
                return Response::json([
                    'message' => "the customer data not found!"
                ], 400);
            }
        }
    }

    public function getMotors()
    {
        $motors = Layanan::where('kendaraan', 'motor')->get();

        return response()->json([
            'message' => "success",
            'data' => $motors
        ]);
    }

    public function getMobils()
    {
        $mobils = Layanan::where('kendaraan', 'mobil')->get();

        return Response::json([
            'message' => "success",
            'data' => $mobils
        ]);
    }

    public function channel()
    {
        $channel = Http::withToken('DEV-ikLYvfjYvudfeJyawfiMh6pbl62PKbndu6758G59')
            ->get('https://tripay.co.id/api-sandbox/merchant/payment-channel'
        );

        return Response::json(json_decode($channel)->data);
    }

    public function make(Request $request)
    {
        $privateKey = 'Py98t-ZSjM2-QMIsc-vOYIp-K3IAI';
        $merchantCode = 'T20234';
        $merchantRef = 'CM'. rand(10000, 99999);
        $amount = $request->nominal;

        $signature = hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey);

        $dataOfMake = [
            'method' => $request->code,
            'merchant_ref' => $merchantRef,
            'amount' => $amount,
            'customer_name' => 'Expo PSDKU Sidoarjo',
            'customer_email' => 'e41212120@student.polije.ac.id',
            'customer_phone' => '41212120',
            'order_items' => [
                [
                    'name' => $request->namaLayanan,
                    'price' => $amount,
                    'quantity' => 1
                ]
            ],
            'callback_url' => '',
            'return_url' => '',
            'expired_time' => '',
            'signature' => $signature
        ];
        $make = Http::withHeaders([
            'Authorization' => 'Bearer DEV-ikLYvfjYvudfeJyawfiMh6pbl62PKbndu6758G59'
        ])->post('https://tripay.co.id/api-sandbox/transaction/create', $dataOfMake);

        $response = json_decode($make)->data;

        $transaction = Transaksi::create([
            'layanan_id' => $request->layananId,
            'provider_id' => $request->providerId,
            'customer_id' => $request->customerId,
            'berlangganan' => 0,
            'reference' => $response->reference,
            'pembayaran' => $response->status,
            'status' => 'proses',
            'nominal' => $response->amount
        ]);

        if($transaction->exists)
        {
            return Response::json([
                'message' => 'payment created!!!',
                'data' => [
                    'reference' => $transaction->reference,
                    'pembayaran' => $transaction->pembayaran,
                    'status' => $transaction->status,
                    'created_at' => $transaction->created_at,
                    'nominal' => $transaction->nominal,
                    'payment_url' => $response->checkout_url
                ]
            ]);
        }else{
            return Response::json([
                'message' => 'insert transaction data fail!!!'
            ]);
        }

        // dd(json_decode($make));
    }

    public function makeDetail($ref)
    {
        $getDetail = Transaksi::firstWhere('reference', $ref);
        if($getDetail->exists)
        {
            return Response::json($getDetail);
        }else{
            return Response::json([
                'message' => 'can\'t find transaction data!!!'
            ]);
        }
    }

    public function updateTransaksi($ref)
    {
        $updating = Transaksi::where('reference', $ref)
                            ->update(['status' => 'selesai']);

        if($updating)
        {
            return Response::json(['message' => $updating]);
        }else{
            return Response::json(['message' => 'fail to update']);
        }
    }

    public function callback()
    {

    }

}
