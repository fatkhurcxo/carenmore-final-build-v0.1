<?php

namespace App\Services\Admin;

use App\Mail\ProviderVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendEmail
 * @package App\Services
 */
class SendEmail
{
    public function providerVerification(Request $request, SendData $get, Int $id)
    {
        $providers = $get->dataDetailPengajuan($id);
        $optionalMessage = $request->optionalMessage;

        Mail::to($providers->user->email)->send(new ProviderVerify($providers, $optionalMessage));

        return redirect()->route('admin.view.base');
    }
}
