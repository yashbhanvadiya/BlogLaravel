<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{

    function index()
    {
    	$record = array('title'=>"About",'heading'=>"This is about page");
    	return view('about',['data'=>$record]);
    }

}
