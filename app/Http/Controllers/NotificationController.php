<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){

        $notifications = Notification::where('user_id',auth()->user()->id)->first();

        $notificationDetail = NotificationDetail::with('user')->where('notification_id',$notifications->id)->get();

        $detail = [];
        for ($i=0;$i<count($notificationDetail);$i++){
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

            array_push($detail,['notifDetail'=>$notificationDetail[$i], 'time'=>$diff, 'unit'=>$unit]);
        }

        return view('notification',compact('detail'));
    }
}
