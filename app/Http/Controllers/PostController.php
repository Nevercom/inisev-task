<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'website_id'  => 'required|exists:websites,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::create($data);


        return response()->json(
            [
                'status' => 'Post created successfully',
                'post'   => $post,
            ], 201);
    }
}
