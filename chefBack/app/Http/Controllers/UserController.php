<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::all();

        return response()->json(['data'=>$users], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function register(Request $request)
    
        {
            $body = $request->all();
            $body['password'] = Hash::make($body['password']);
            $user = User::create($body);
            return response($user, 201);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response([
                    'message' => 'Wrong credentials'
                ], 400);
            }
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            $user->token=$token;
            return response([
                'user'=>$user
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to login the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($request, $id)
    {
        
        $user = User::find($id);
        if($request->has('name')) {
            $user->name = $request->name();
        }

        if($request->has('email') && $user->email!=$request->email) {
            $user->email = $request->email();
        }

        if($request->has('password') && $user->password!=$request->password) {
            $user->password = $request->password();
        }

        $user->save();

        return response()->json(['data'=>$user], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        try {
            $request->validate(['img' => 'required|image']);
            $user = Auth::user();
            $imageName = time() . '-' . request()->img->getClientOriginalName();
            request()->img->move('images/users', $imageName);
            $user->update(['imagen' => $imageName]);
            return response($user); 

        } catch (\Exception $e) {
            return response([
                'error' => $e,
            ], 500);
        }
    }

    public function GetAll(Request $request)
    {
        try {
            $body = Post::with('user')->get();
            return response($body, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function PostByUser()
    {
        try {
            $body = Post::with('user')->get();
            return response($body, 201);
        } catch (\Exception $e) {
            return response([
                'message' => 'There was an error trying to register the user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
