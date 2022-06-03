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

Route::get('/', function () {

    return view('posts');

});


Route::get('posts/{post}', function($page) {

    $path = "../resources/posts/{$page}.html";

    if (!file_exists($path)) {
        return redirect("/");
    }

    $post = cache()->remember("posts.{$page}", now()->addMinute(), fn() => file_get_contents($path));

    return view('post', ['post' => $post]);
    
})->where('post', '[A-z0-9-_]+');