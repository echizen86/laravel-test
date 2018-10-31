<?php

use App\Http\Controllers\UserController;

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

Route::get('send', function() {
    $text = UserController::sendEmail();
    return $text;
});

Route::get('mail/send', 'UserController@sendEmail');


Route::resource('message', 'MessageController');
Route::resource('user', 'UserController');
Route::resource('mailconfig', 'MailConfigController');
Route::resource('messageuser', 'MessageUserController');
