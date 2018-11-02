<?php
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\MessageController;
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
// Route::get('send', function(Request $request) {
//     $text = MessageController::sendMail($request);
//     return $text;
// });

Route::get('mail/received', 'MessageController@recievedMailREST');

Route::get('mail/send', 'MessageController@send');

Auth::routes();

Route::resource('user', 'UserController');
Route::resource('message', 'MessageController');
