<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatGemmaController extends Controller
{
    public function index()
    {
        return Inertia::render('gemma/index', [
            'user' => Auth::user()->name,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $client = new Client();
        $response = $client->post('http://localhost:7000/translate_and_generate/', [
            'json' => ['text' => $request->input('message')]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        return Inertia::render('gemma/index', [
            'user' => Auth::user()->name,
            'input_text' => $responseBody['input_text'],
            'model_output' => $responseBody['model_output']
        ]);
    }

}
