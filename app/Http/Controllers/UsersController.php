<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
	public function index()
	{		
    	return User::find(1)->myCmp;
	}
}
