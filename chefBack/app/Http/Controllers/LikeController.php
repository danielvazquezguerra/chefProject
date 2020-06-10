<?php
namespace App\Http\Controllers;
use App\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LikeController extends Controller
{
public function Like($id, Request $request)
    {
        {
            $user_id = Auth::id();
            $post = Recipe::find($id);
            $likes = $post->likes()->where('user_id',$user_id)->get();
            if($likes->isNotEmpty()){
                return response([
                    'message' => 'No puedes meter más like'
                ],400);
            }
            $post->likes()->create(['user_id'=>$user_id]);
            return response([
                'message' => 'thanks u '
            ],201);
        }
    }
}