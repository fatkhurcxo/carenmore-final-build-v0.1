<?php

use App\Http\Controllers\API\MobileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/usercreate', [MobileController::class, 'createUser']);
Route::get('/example', [MobileController::class, 'sendOneUser']);
Route::post('/userlogin', [MobileController::class, 'authUser']);
Route::get('/userdetail/{userId}', [MobileController::class, 'userDetail']);
Route::get('/motors', [MobileController::class, 'getMotors']);
Route::get('/mobils', [MobileController::class, 'getMobils']);
Route::get('/channel', [MobileController::class, 'channel']);
Route::post('/make', [MobileController::class, 'make']);
Route::get('/makedetail/{ref}', [MobileController::class, 'makeDetail']);
Route::patch('/detail/{ref}', [MobileController::class, 'updateTransaksi']);
