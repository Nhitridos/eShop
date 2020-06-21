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

// Route::get('/', function () {
//     return view('welcome');
// });

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello W</h1>';
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
//Route::get('/posts/answer', 'PostsController@answer');

Route::resource('posts', 'PostsController');
Route::get('posts/show/{id}', 'PostsController@showPostsCategory')->name('show.posts.category');
//Route::get('posts/answer', 'PostsController@answer')->name('posts.answer');

// Route::get('/users/{id}', function ($id) {
//     return 'This is user '.$id;
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
