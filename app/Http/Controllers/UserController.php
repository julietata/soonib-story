<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login_index(){
        return view('auth.login');
    }

    public function register_index(){
        return view('auth.register');
    }

    public function register(Request $request){
        $username = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $password = $request->password;

        $new_user = new User;
        $new_user->name = $username;
        $new_user->email = $email;
        $new_user->gender = $gender;
        $new_user->password = bcrypt($password);

        $new_user->save();
        return redirect('login');
    }

    public function login(Request $request){
        $username = $request->name;
        $password = $request->password;

        if (auth()->attempt(['name' => $username, 'password' => $password])){
            if (\Illuminate\Support\Facades\Auth::user()->name == "Admin"){
                return redirect('/admin');
            }
            else{
                return redirect('/');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    //
}
