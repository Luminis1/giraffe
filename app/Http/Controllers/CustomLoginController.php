<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function loginPage()
    {
        return view('auth.customLogin');
    }

    public function loginUser(Request $request)
    {
        $user = User::where('email', $request['login'])->first();
        $credentials = array('email' => $request['login'], 'password' => $request['pass']);

        if(empty($user)){
            User::create([
                'email' => $request['login'],
                'password' => password_hash($request['pass'], PASSWORD_DEFAULT)
            ]);
            Auth::attempt($credentials);
            return redirect('/');
        }elseif(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return redirect('/login');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
