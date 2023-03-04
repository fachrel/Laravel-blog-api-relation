<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();        
        // return response()->json([ 'data' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id){
        $post = Post::with('author:id,username')->findOrfail($id);
        return new PostDetailResource($post);
    }
}
