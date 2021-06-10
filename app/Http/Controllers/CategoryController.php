<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CategoryController extends Controller
{
    public function DataSave(Request $req)
    {
    	$data = array('category_name'=>$req->get('category'));
    	// echo "<pre>";
    	// print_r($data);
    	// exit;
    	
    	DB::table('category')->insert($data);

    	return redirect('category')->with('msg','Data Inserted');
    }

    public function showCategoryRecord()
    {
    	$data = DB::table('category')->get();
    	// dd($data->toArray());
    	// exit;

    	return view('showCategory',['AllCategory'=>$data]);
    }
}
