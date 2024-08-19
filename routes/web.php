<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SubscriptionController;

// using web routes for simplicity, should be api routes in a real-world scenario (artisan install:api)

Route::get('/websites', [WebsiteController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/subscribe', [SubscriptionController::class, 'store']); // since there is no authentication, we don't use Route Model Binding