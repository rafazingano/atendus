<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $chat = Auth::user();

        $url = config('app.n8n_chat_url');

        $data = [
            'message' => $request->message,
            'chat' => $chat->toArray(),
        ];

        $response = Http::post($url, $data);

        if ($response->successful()) {
            return response()->json(['reply' => $response->body()]);
        } else {
            return response()->json([
                'error' => 'Falha ao enviar dados para o endpoint externo'
            ], $response->status());
        }

    }

}
