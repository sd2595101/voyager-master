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
    $valid = Auth::check();
    if ($valid) {
        $posts = ($valid) ? \App\Post::all() : [];
        return view('welcome', compact('posts'));
    } else {
        return view('auth.login');
    }
});

Route::get('/disabled', function () {
    return view('auth.disabled');
});

Route::get('post/{slug}', function($slug){
    $post = App\Post::where('slug', '=', $slug)->firstOrFail();
    return view('post', compact('post'));
})->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'HomeController@index')->name('r-logout');

