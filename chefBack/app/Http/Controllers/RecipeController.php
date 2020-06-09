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
    public function index()
    {
        //
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
                if($request->has('imagen')){
                    $imageName = time() . '-' . request()->imagen->getClientOriginalName(); //time() es como Date.now()
                    request()->imagen->move('images/posts', $imageName); //mueve el archivo subido al directorio indicado (en este caso public path es dentro de la carpeta public)
                    $body['imagen'] = $imageName;    
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

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
