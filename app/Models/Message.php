<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'email',
        'url',
        'text',
        'date_add',
        'status',
        'parent_id',
    ];

    // связь с родительским сообщением
    public function parent()
    {
        return $this->belongsTo(Message::class, 'parent_id');
    }
}
