<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{

	function index(){

		$record =  array('title'=>"Contact",'heading'=>"This is contact page");
		return view('contact',['data'=>$record]);

	}

}
