<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'/','middleware'=>'auth','namespace' => 'App\Http\Controllers\user'],function(){
    Route::get('/Quize', 'quizeController@index')->name('user.Quize');
    Route::get('/startQuize/{id}', 'quizeController@startQuize')->name('Quize.start');
    Route::post('/result', 'quizeController@result')->name('Quize.result');
    Route::get('/materials/{course_id}', 'materialsController@index')->name('user.materials');
});

