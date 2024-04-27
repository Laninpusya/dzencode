<?php

namespace App\Http\Controllers;

use App\Models\MainMessage;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sort(Request $request)
    {
        $field = $request->input('field', '');
        $order = $request->input('order', '');

        $mainMessage = MainMessage::orderBy($field, $order)->paginate(25);
        return view('index', compact('mainMessage'));
    }
    public function getFullMessage($id)
    {
        $mainMessage = MainMessage::find($id);
        if ($mainMessage) {
            return response()->json(['full_text' => $mainMessage->text]);
        } else {
            return response()->json(['error' => 'Message not found'], 404);
        }
    }

}
