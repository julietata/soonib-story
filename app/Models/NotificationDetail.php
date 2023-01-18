<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationDetail extends Model
{
    use HasFactory;

    protected $fillable = ['notification_id', 'user_id', 'content', 'message_id'];

    public function notification(){
        return $this->belongsTo(Notification::class, 'notification_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function message(){
        return $this->belongsTo(Message::class, 'message_id','id');
    }
}
