<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/users', function ($id) {
//     $users=DB::table('users')->get();
//     return $users;
// });

Route::get('/users','HomeController@allUsers');
Route::post('/users/register','UserController@store');
Route::apiResource('posts',"PostController");
// Route::apiResource('users',"UserController");
Route::apiResource('recipes',"RecipeController");
Route::apiResource('likes',"LikeController");


Route::fallback(function (){
    return response()->json(['mensaje'=>'ruta no encontrada'], 404);
});