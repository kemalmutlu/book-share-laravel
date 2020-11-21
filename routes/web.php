<?php

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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/books', 'BookController')->except([
        'index',
    ]);;

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::post('books/{book_id}/comments', 'CommentController@store')->name('comments.store');

    Route::get('comments/{id}', 'CommentController@edit')->name('comments.edit');
    Route::put('comments/{id}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');
});
