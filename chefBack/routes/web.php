<?php

use Illuminate\Routing\Router;
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

Route::get('/','HomeController@index');
Route::get('/', function() {
    return ["nombre" => "Daniel"];
});

Route::get('/hola', function (){
    
    $nombre=request('nombre');

    return view('home', ['name' => $nombre]);
});

// Route::get('/hola/{name}', function($name){
//     return view('home',
//     ['name'=> $name]
// );

// });


Route::get('/posts','PostsController@index');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/blog/{$post}','HolaController@show');