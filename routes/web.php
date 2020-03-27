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
    
   // $post = \App\Post::first();

    //$categories = \App\Category::all();

    //$post->categories()->sync($categories);

    //dd($categories);

    
    return view('welcome');
});





//Authunetication routes

Auth::routes();

Auth::routes();

//Route group
Route::middleware(['auth'])->group(function () {

    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');

    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

   

});

/*
//Resource routes 

Route::resource('categories', 'CategoriesController');

//Resource Routes are automatically protected with middleware
Route::resource('posts', 'PostsController')->middleware('auth');

//Get routes

Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

//put routes
Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('add-category', 'CategoriesController@add');
    //Route::post('add-category', 'CategoriesController@add');
*/