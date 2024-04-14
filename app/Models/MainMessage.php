<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMessage extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'email', 'url', 'text'];

    /**
     * Get the responses for the main message.
     */
    public function responses()
    {
        return $this->hasMany(Response::class, 'parent_message_id');
    }
}
