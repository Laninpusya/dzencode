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
        $mainMessage = MainMessage::orderBy('created_at', 'desc')->paginate(25);
//        $responses = Response::getResponses();
//        dd($responses);


        return view('index', [
            'mainMessage' => $mainMessage,
//            'responses' => $responses,
        ] );
    }
    public function main_massage()
    {

        return view('main_massage');
    }
    public function single($id){

        $mainMessage = MainMessage::where('id', $id)->first();
//        $responses = Response::getResponses();
        $responses = Response::where('parent_message_id', $id)
            ->select('text', 'level', 'email', 'id', 'user_name', 'url', 'created_at', 'parent_message_id')
            ->orderBy('created_at', 'asc')
            ->paginate(3);
        return view('page', [
            'mainMessage' => $mainMessage,
            'responses' => $responses,
            ]);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'parent_message_id' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'g-recaptcha-response.required' => 'Пожалуйста, введите капчу.',
            'g-recaptcha-response.captcha' => 'Неверная капча, пожалуйста, попробуйте еще раз.',
        ]);

        DB::beginTransaction();

        try {
            DB::table('responses')->insertGetId([
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
            return redirect()->back()->with('error', 'Произошла ошибка при добавлении комментария');
        }

        return redirect()->back()->with('success', 'Комментарий добавлен');
    }
    public function main_massage_save(Request $request)
    {

        $validatedData = $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        DB::beginTransaction();

        try {
            DB::table('main_messages')->insertGetId([
                'user_name' => $validatedData['user_name'],
                'email' => $validatedData['email'],
                'text' => $validatedData['text'],
                'created_at' => Carbon::now(),
                'url' => $request['url'] ?? null,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Произошла ошибка при добавлении комментария');
        }

        return redirect()->route('index')->with('success', 'Комментарий добавлен');
    }

}
