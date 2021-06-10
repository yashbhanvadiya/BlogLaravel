<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class testController extends Controller
{
    public function contactm()
    {
    	return view('contact');
    }

    public function aboutm()
    {
    	return view('about');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function checkdata(Request $req)
    {
    	$email = $req->get('email');
        $pass = $req->get('password');
        $data = User::where('email',$email)->where('password',$pass)->count();
        if($data == 1)
        {
            $alldata = User::where('email',$email)->where('password',$pass)->get();
            $req->session()->put('record',$alldata);
            return redirect('/dashboard');
        }
        else
        {
            return redirect('/login')->with('msg','Invalid email and password');
        }
    }

}