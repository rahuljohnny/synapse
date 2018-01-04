<?php

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/','FrontController@loginOrRegister');



Route::get('/front','FrontController@index');

Route::post('/users/loginuser','UserController@postSignIn');


Route::middleware(['auth'])->group(function (){



    Route::get('/logout','UserController@getLogout')->name('logout');

    Route::get('/dashboard','UserController@adminDashboard')->name('dashboard');
    Route::resource('posts', 'PostController');

    Route::get('/posts/{post}/delete', 'PostController@deletePost');
    Route::post('/like', 'PostController@likeDislikePost')->name('like');
    Route::post('/lite', 'PostController@onlyToPassTwoVariable')->name('lite');
});

Route::resource('users', 'UserController');
Route::post('/edit', 'PostController@update')->name('edit');


/*
Route::post('/edit',function (Request $request){
        return $request;
})->name('edit');

*/

