<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
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

Route::get('send_email',[MailController::class,'sendEmail']);

Route::get('image-upload', [ ImageController::class, 'upload' ])->name('image.upload');
Route::post('image-store', [ ImageController::class, 'store' ])->name('image.upload.post');
