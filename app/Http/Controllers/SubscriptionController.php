<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'    => 'required|exists:users,id',
            'website_id' => 'required|exists:websites,id',
        ]);
        $isSubscribed = Subscription::where('user_id', $request->user_id)
            ->where('website_id', $request->website_id)
            ->exists();

        if ($isSubscribed) {
            return response()->json(['status' => 'Already subscribed']);
        }
        Subscription::create($data);

        return response()->json(['status' => 'Subscription created'], 201);
    }
}