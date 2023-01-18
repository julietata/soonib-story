<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\Notification;
use App\Models\NotificationDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index(Request $request){
        $favorites = null;
        $like = null;
        $data = null;
        if ($request->has('key')){
            $data = Message::where('content', 'like', '%'.$request->input('key').'%')->paginate(6)->withQueryString();
        }
        else {
            $data = Message::paginate(6);
        }
        if(auth()->user()){
            $favorites = Favorite::where('user_id', auth()->user()->id)->get();
            $like = Dislike::where('user_id', auth()->user()->id)->get();
        }
        return view('home', compact('data', 'favorites', 'like'));
    }

    // public function admin(Request $request){

    //     $data = null;
    //     if ($request->has('key')){
    //         $data = Message::where('content', 'like', '%'.$request->input('key').'%')->paginate(6)->withQueryString();
    //     }
    //     else {
    //         $data = Message::paginate(6);
    //     }
    //     return view('admin', compact('data'));
    // }

    public function create_index(){
        return view('createMessage');
    }

    public function new_message(Request $request){
        $user = Auth::user()->id;
        $content = $request->message;
        $anonymous = $request->anonymous ? true : false;
        $timestamp = Carbon::now();

        //kata-kata kasar
        $badWords = ['kontol','fuck','kimak','memek','ass','asshole', 'bitch','shit'];
        $contentToCheck = strtolower($content);
        $badWordCheck = str::contains($contentToCheck,$badWords);
        if($badWordCheck){
            return redirect()->back()->withErrors(['badWord'=>'Bad Word Detected!'])->withInput();
        }

        $create = new Message;
        $create->user_id = $user;
        $create->content = $content;
        $create->timestamp = $timestamp;
        $create->anonymous = $anonymous;
        $create->save();
        return redirect('/');
    }

    public function update_message($id){
        $data = Message::all()->find($id);
        return view('updateMessage', compact('data'));
    }

    public function update(Request $request, $id){
        $message = Message::all()->find($id);
        $content = $request->message;
        $message->content = $content;
        $message->save();

        return redirect('/profile');
    }

    public function delete_message($id){
        Favorite::where('message_id',$id)->delete();
        Dislike::where('message_id',$id)->delete();
        $message = Message::destroy($id);
        return redirect('/profile');
    }

    public function fav_message($id){
        $user = Auth::user()->id;
        $message = $id;

        $exist = Favorite::all()->where('user_id', $user)->where('message_id',$id)->first();
        if($exist){
            Favorite::where('user_id', $user)->where('message_id',$id)->delete();
            return redirect('/');
        }

        $fav = new Favorite;
        $fav->user_id = $user;
        $fav->message_id = $message;
        $fav->save();

        $getMessage = Message::find($id);

        $notification = Notification::where('user_id',$getMessage->user_id)->first();

        NotificationDetail::create([
            'notification_id'=>$notification->id,
            'user_id'=>$user,
            'message_id'=>$message,
            'content'=>'favorite'
        ]);

        return redirect('/');
    }

    public function trending_message(){
        $count = Favorite::select('message_id', \DB::raw("count(message_id) as count"))->groupBy('message_id')->orderBy('count', 'desc')->get();
        // dd($count);
        return view('trending',compact('count'));
    }

    public function dislike_message($id){
        $user = Auth::user()->id;
        $message = $id;

        $exist = Dislike::all()->where('user_id', $user)->where('message_id',$id)->first();
        if($exist){
            Dislike::where('user_id', $user)->where('message_id',$id)->delete();
            return redirect('/');
        }

        $dislike = new Dislike;
        $dislike->user_id = $user;
        $dislike->message_id = $message;
        $dislike->save();

        $getMessage = Message::find($id);

        $notification = Notification::where('user_id',$getMessage->user_id)->first();

        NotificationDetail::create([
            'notification_id'=>$notification->id,
            'user_id'=>$user,
            'message_id'=>$message,
            'content'=>'dislike'
        ]);

        return redirect('/');
    }

    public function my_message() {
        $user = optional(Auth::user())->id;
        $messages = Message::where("user_id", $user)->get();

        return view('profile', compact('messages'));
    }
}
