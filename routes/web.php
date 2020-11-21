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

    ## Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    ## Books
    Route::resource('/books', 'BookController')->except([
        'index',
    ]);;

    ## Comments
    Route::post('books/{book_id}/comments', 'CommentController@store')->name('comments.store');
    Route::get('comments/{id}', 'CommentController@edit')->name('comments.edit');
    Route::put('comments/{id}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');

    ## Users
    Route::get('users', 'UserController@list')->name('users.list');
    Route::get('users/{id}', 'UserController@show')->name('users.show');
});
