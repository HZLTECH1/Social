<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function create_user(Request $request){
        $data = $request->validate(['name' => 'required', 'password' => 'required']);
        $user = new User();
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->save();
        Auth::login($user);
        return redirect(route('index'))->with('status', 'با موفقیت لاگین شدید');
    }
    public function login_user(Request $request){
        $data = $request->validate(['name' => 'required', 'password' => 'required']);
        if(Auth::attempt($data, true)){
            $request->session()->regenerate();
            return redirect(route('index'))->with('status', 'با موفقیت لاگین شدید');
        }
    }
    public function logout_user(){
        Auth::logout();
        return redirect(route('index'))->with('status', 'با موفقیت خارج شدید');
    }
    public function test(){
        return dd(Auth::user());
    }
}
