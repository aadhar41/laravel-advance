<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;
use App\Facades\Postcard;
use App\Services\PostcardSendingService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pay', [PayOrderController::class, 'store']);

Route::get('/channels', [ChannelController::class, 'index']);

Route::get('/post/create', [PostController::class, 'create']);

// Send Postcard Function
Route::get('/postcards', function () {
    $postcardService = new PostcardSendingService($country = "U.S.", $width = 4, $height = 6);
    $postcardService->hello("Hello from Coder's Tape USA!", "aadhar44@mailinator.com");
});

// Send Postcard using Custom Facades Method. 
Route::get('/facades', function () {
    Postcard::hello("This is a sample postcard sent by Aadhar gaur.", "aadhar44@mailinator.com");
});


Route::get('/macros-test', function () {

    // dd(Str::prefix('9412578963', 'ABCD-'));
    // dd(Str::partNumber('9412578963'));

    return Response::errorJson('A huge error occured! BOOM!');
});
