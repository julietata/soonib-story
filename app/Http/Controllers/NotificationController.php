<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(){

        $notifications = Notification::where('user_id',auth()->user()->id)->first();

        $notificationDetail = NotificationDetail::with('user')->where('notification_id',$notifications->id)->get();

        $detail = [];
        for ($i=count($notificationDetail)-1;$i>=0;$i--){
            $dateCreate = new Carbon($notificationDetail[$i]->created_at);
            $now = Carbon::now();

            $diff = $dateCreate->diffInYears($now);
            $unit = 'year';

            if ($diff <= 0){
                $diff = $dateCreate->diffInMonths($now);
                $unit = 'month';
            }

            if ($diff <= 0){
                $diff = $dateCreate->diffInDays($now);
                $unit = 'day';
            }

            if ($diff <= 0){
                $diff = $dateCreate->diffInHours($now);
                $unit = 'hour';
            }

            if ($diff <= 0){
                $diff = $dateCreate->diffInMinutes($now);
                $unit = 'minute';
            }

            if ($diff <= 0){
                $diff = $dateCreate->diffInSeconds($now);
                $unit = 'second';
            }

            array_push($detail,['notifDetail'=>$notificationDetail[$i], 'time'=>$diff, 'unit'=>$unit]);
        }

        return view('notification',compact('detail'));
    }

    public function createNotificationView(){
        return view('createNotification');
    }

    public function createNotification(Request $request){

        $user = Auth::user()->id;
        $validation = $request->validate([
            'notification'=>'required'
        ]);

        $allUser = User::all();

        for ($i=0;$i<count($allUser);$i++){
            $notification = Notification::where('user_id',$allUser[$i]->id)->first();
            NotificationDetail::create([
                'notification_id'=>$notification->id,
                'user_id'=>$user,
                'message_id'=>1,
                'content'=>$validation['notification'],
            ]);
        }

        return redirect('/notification');
    }
}
