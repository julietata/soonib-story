<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function login_index(){
        return view('auth.login');
    }

    public function register_index(){
        return view('auth.register');
    }

    public function register(Request $request){
    $validator = Validator::make($request->all(),
    [
        'name' => 'required|max:255',
        'gender' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ],
    [
        'required' => 'The :attribute field is required.',
        'name.max' => 'Name can\'t be more than 255 characters.',
        'email.email' => 'Wrong email format.',
        'email.unique' => 'Email must be unique.',
        'password.min' => 'Password must be at least 8 characters.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }

    $username = $request->get('name');
    $gender = $request->get('gender');
    $email = $request->get('email');
    $password = $request->get('password');

    $new_user = new User();
    $new_user->setAttribute('name', $username);
    $new_user->setAttribute('gender', $gender);
    $new_user->setAttribute('email', $email);
    $new_user->setAttribute('password', bcrypt($password));

    $new_user->save();
    $user = User::where('email',$request->email)->first();

    Notification::create([
        'user_id'=>$user->id
    ]);

    $new_user->notify(new RegisterNotification($new_user));
    return redirect('login');
}

public function login(Request $request) {

    $validator = Validator::make($request->all(),
    [
       'name' => 'required',
       'password' => 'required'
    ],
    [
        'required' => 'The :attribute field is required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }


    $username = $request->get('name');
    $password = $request->get('password');

    if (auth()->attempt(['name'=>$username, 'password'=>$password])) {
        if ($request->remember != null) {
            Cookie::queue(Cookie::make('remember', $username, 2628000));
        }
        return redirect('/');
    } else {
        return redirect()->back()->with('error', 'Credential doesn\'t match.');
    }
}

public function logout() {
    auth()->logout();
    return redirect('/');
}

public function settings(){
    $user = Auth::user()->id;
    return view('settings', compact('user'));
}

public function update_pic($id){
    $data = User::all()->find($id);
    return view('updatePic', compact('data'));
}

public function updatepic(Request $request, $id){
    $validator = Validator::make($request->all(),
    [
        'update-image' => 'required'
    ],
    [
        'required' => 'No file selected'
    ]);
    if($validator->fails()){
        return redirect()->back()->with($validator);
    }
    $user = User::all()->find($id);
    $image = $request->file('update-image');
    $imageName = $id.'.jpg';
    // $path = $request->file('update-image')->storeAs('storage/assets', $imageName);
    // Storage::disk('local')->put($path . "/" . $imageName, $image);
    // Storage::disk('local')->put($imageName, $image);

    Storage::putFileAs('public/assets', $image, $imageName);
    $user->image = $imageName;
    $user->save();

    return redirect('/settings');
}

public function update_profile($id){
    $data = User::all()->find($id);
    return view('updateProfile', compact('data'));
}

public function updateprof(Request $request, $id){
    $user = User::all()->find($id);
    $validator = Validator::make($request->all(),
    [
       'name' => 'required|max:255',
       'password' => 'required|min:8'
    ],
    [
        'required' => 'The :attribute field is required',
        'name.max' => 'Name can\'t be more than 255 characters.',
        'password.min' => 'Password must be at least 8 characters.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }


    $username = $request->get('name');
    $password = $request->get('password');
    $user->name = $username;
    $user->password = bcrypt($password);
    $user->save();

    return redirect('/settings');
}

}
