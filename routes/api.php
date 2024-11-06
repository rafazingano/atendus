<?php

use App\Http\Controllers\ChatController;
use App\Models\Account;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->post('/chat', [ChatController::class, 'chat']);

/*

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/account', function (Request $request) {
    return Auth::user();
    // return $request->user();
})->middleware('auth:sanctum');

Route::get('/chat', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

*/

Route::post('/chat/tokens/create/{chat}', function (Request $request, Chat $chat) {
    $token = $chat->createToken($chat->name);

    return ['token' => $token->plainTextToken];
});

