<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostAll(Request $request)
    {
        try {
            $body = Recipe::orderBy('id','DESC')->get();   
            return response($body->load('user.recipe.likes','likes'), 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        try {
            $body = $request->all();
            $body['user_id'] = Auth::id();
            if($request->has('images')){
                $imageName = time() . '-' . request()->images->getClientOriginalName(); //time() es como Date.now()
                request()->images->move('images/posts', $imageName); //mueve el archivo subido al directorio indicado (en este caso public path es dentro de la carpeta public)
                $body['images'] = $imageName;    
            }
            $post = Recipe::create($body);
            return response($post, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
