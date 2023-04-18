<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['auth' => true]);
Auth::routes(['verify' => true]);

Route::resource('libros',App\Http\Controllers\LibroController::class, )->middleware(['auth','verified']);
Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'] )->name('home')->middleware(['auth','verified']);

Route::post('sendemail', function(){
     Mail::to('supportLaravel@gmail.com')->send(new SendEmail);
     return view('auth.passwords.confirm');
})->name('sendemail');
