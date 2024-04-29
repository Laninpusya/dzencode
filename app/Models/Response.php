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
