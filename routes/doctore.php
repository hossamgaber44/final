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


Route::get('/doctore/login', 'App\Http\Controllers\Auth\adminController@login')->middleware('guest:admin');
Route::post('/doctore/login', 'App\Http\Controllers\Auth\adminController@dologin')->name('doctore.login');

Route::group(['prefix'=>'/doctore','middleware'=>'auth:admin','namespace' => 'App\Http\Controllers\doctore'],function(){
    Route::get('/', 'doctoreDashboardController@index')->name('doctore.dashboard');
    Route::get('delete_student/{id}', 'doctoreDashboardController@deleteStudent')->name('doctore.deleteStudent');
    Route::group(['prefix'=>'/courses'],function(){
        Route::get('/', 'doctoreCoursesController@index')->name('doctore.courses');
        Route::get('/create', 'doctoreCoursesController@create')->name('courses.create');
        Route::post('/store', 'doctoreCoursesController@store')->name('courses.store');
        Route::get('/edit/{id}', 'doctoreCoursesController@edit')->name('courses.edit');
        Route::post('/update', 'doctoreCoursesController@update')->name('courses.update');
        Route::get('/delete/{id}', 'doctoreCoursesController@delete')->name('courses.delete');
    });

    Route::group(['prefix'=>'/quizes'],function(){
        Route::get('/', 'doctoreQuizesController@index')->name('doctore.quizes');
        Route::get('/create','doctoreQuizesController@create')->name('quizes.create');
        Route::post('/store', 'doctoreQuizesController@store')->name('quizes.store');
        Route::get('/delete/{id}', 'doctoreQuizesController@delete')->name('quizes.delete');
        Route::get('/showGrades/{id}', 'doctoreQuizesController@showGrades')->name('quizes.showGrades');
        Route::get('/showUserAnswer/{id}/Quize/{qId}', 'doctoreQuizesController@showAnswer')->name('quizes.showAnswer');
    });

    Route::group(['prefix'=>'/books'],function(){
        Route::get('/', 'booksController@index')->name('doctore.books');
        Route::get('/create', 'booksController@create')->name('books.create');
        Route::post('/store', 'booksController@store')->name('books.store');
        Route::get('/edit/{id}', 'booksController@edit')->name('books.edit');
        Route::post('/update', 'booksController@update')->name('books.update');
        Route::get('/delete/{id}', 'booksController@delete')->name('books.delete');
    });

});





