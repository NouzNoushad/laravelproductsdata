<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function registerUser(Request $req){

        $req->validate([
            'name' => ['required', 'regex: /^[a-zA-Z0-9\s]*$/'],
            'email' => 'required | email | unique:users,email',
            'password' => 'required | confirmed | max:5'
        ]);
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        $req->session()->put('user', $req->name);
        return redirect('/');
    }

    public function loginUser(Request $req){

        $req->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        $user = User::where('email', $req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            $req->session()->flash('status', 'Invalid Password');
            return redirect('/login');
        }
        $req->session()->put('user', $user->name);
        return redirect('/');
    }

    public function logoutUser(){

        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('/');
    }
}
