<?php

namespace App\Http\Controllers;

use App\Models\MainMessage;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $mainMessage = MainMessage::all();
        $responses = Response::getResponses();


        return view('index', [
            'mainMessage' => $mainMessage,
            'responses' => $responses,
        ] );
    }
}
