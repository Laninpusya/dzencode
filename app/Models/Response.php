<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'email', 'url', 'text', 'level', 'parent_message_id'];

    /**
     * Get the parent message for the response.
     */
    public function mainMessage()
    {
        return $this->belongsTo(MainMessage::class, 'parent_message_id');
    }
    public static function getResponses()
    {
//        return DB::table('responses')
//            ->join('main_messages', 'responses.parent_message_id', '=', 'main_messages.id')
//            ->where('main_messages.id', '=', 'responses.parent_message_id')
//            ->select('responses.text', 'responses.level', 'responses.email', 'responses.id', 'responses.user_name', 'responses.url', 'responses.created_at', 'responses.parent_message_id', 'main_messages.user_name as name')
//            ->get();
        return Response::with('mainMessage')
            ->select('text', 'level', 'email', 'id', 'user_name', 'url', 'created_at', 'parent_message_id')
            ->orderBy('created_at', 'asc')
            ->paginate(25);

    }

    /**
     * Get the responses for the response.
     */
    public function responses()
    {
        return $this->hasMany(Response::class, 'parent_message_id');
    }
}
