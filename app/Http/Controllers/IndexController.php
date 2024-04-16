<?php

namespace App\Http\Controllers;

use App\Models\MainMessage;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $mainMessage = MainMessage::all();
        $responses = Response::getResponses();
//        dd($responses);


        return view('index', [
            'mainMessage' => $mainMessage,
            'responses' => $responses,
        ] );
    }

    public function submit_massage(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'parent_message_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $massage = DB::table('responses')->insertGetId([
                'user_name' => $validatedData['user_name'],
                'email' => $validatedData['email'],
                'text' => $validatedData['text'],
                'parent_message_id' => $validatedData['parent_message_id'],
                'created_at' => Carbon::now(),
                'url' => $request['url'] ?? null,
                'level' => $request['level'] ?? null,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('index')->with('error', 'Произошла ошибка при добавлении комментария');
        }

        return redirect()->route('index')->with('success', 'Комментарий добавлен');
    }

}
