<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function dislike(){
        return $this->hasMany(Dislike::class);
    }

    public function favorite(){
        return $this->hasMany(Favorite::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notificationDetail(){
        return $this->hasMany(Message::class);
    }
}
