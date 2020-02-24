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



Route::get('/', function () {
    
    $post = \App\Post::first();

    $categories = \App\Category::all();

    $post->categories()->sync($categories);

    dd($categories);
    
    
    
    return view('welcome');
});


//Resource routes 

Route::resource('categories', 'CategoriesController');

Route::resource('posts', 'PostsController');




//Get routes

Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');







//Authunetication routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('add-category', 'CategoriesController@add');
