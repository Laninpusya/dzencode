<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $headMessage = Message::where('is_reply', 0)->first();
        $responses = Message::where('parent_message_id', $headMessage->id)->get();

        return view('index', [
            'headMessage' => $headMessage,
            'responses' => $responses,
        ] );
    }
}
