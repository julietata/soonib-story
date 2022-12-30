<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request){

        $data = null;
        if ($request->has('key')){
            $data = Message::where('content', 'like', '%'.$request->input('key').'%')->paginate(6)->withQueryString();
        }
        else {
            $data = Message::paginate(6);
        }
        return view('home', compact('data'));
    }

    public function create_index(){
        return view('createMessage');
    }

    public function new_message(Request $request){
        $user = Auth::user()->id;
        $content = $request->message;
        $anonymous = $request->anonymous ? true : false;
        $timestamp = Carbon::now();

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

        return redirect('/');
    }

    public function delete_message($id){
        $message = Message::destroy($id);
        return redirect('/');
    }

    public function fav_message($id){
        $user = Auth::user()->id;
        $message = $id;

        $fav = new Favorite;
        $fav->user_id = $user;
        $fav->message_id = $message;
        $fav->save();

        return redirect('/');
    }

    public function dislike_message($id){
        $user = Auth::user()->id;
        $message = $id;

        $dislike = new Dislike;
        $dislike->user_id = $user;
        $dislike->message_id = $message;
        $dislike->save();

        return redirect('/');
    }
    
    public function my_message() {
        $user = Auth::user()->id;
        $messages = Message::where("user_id", $user)->get();

        return view('profile', compact('messages'));
    }
}
