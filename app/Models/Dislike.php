<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function message(){
        return $this->belongsTo(Message::class, 'message_id','id');
    }
}
