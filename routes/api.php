<?php

use App\Http\Controllers\AwajWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/awaj-webhook', [AwajWebhookController::class, 'handle'])->name('awaj.webhook');