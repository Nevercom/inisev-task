<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PendingPostNotification;

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

        // create a list of notifications to be processed later
        $subscribers = $post->website->subscribers->map(function ($subscriber) use ($post) {
            return [
                'user_id' => $subscriber->user_id,
                'post_id' => $post->id,
            ];
        });

        PendingPostNotification::create($subscribers);

        return response()->json(
            [
                'status' => 'Post created successfully',
                'post'   => $post,
            ], 201);
    }
}
