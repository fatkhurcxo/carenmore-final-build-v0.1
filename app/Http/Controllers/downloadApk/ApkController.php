<?php

namespace App\Http\Controllers\downloadApk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApkController extends Controller
{
    public function downloadApk()
    {
        return Storage::download('public/app-armeabi-v7a-release.apk');
    }
}
