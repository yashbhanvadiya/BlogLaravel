<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class subcategoryController extends Controller
{
    public function getsubdata()
    {
    	$data = DB::table('category')->get();

    	return view('/subcategory',['category'=>$data]);
    }

    public function DataSave(Request $req)
    {
    	$data = array('category_sub_name'=>$req->get('category_sub_id'),'subcategory_name'=>$req->get('subcategory_name'));
    	// dd($req->toArray());
    	DB::table('subcategory')->insert($data);

    	return redirect('/subcategory')->with('msg','Data Inserted Successfully');
    }

    public function ShowSubrecord()
    {
    	$data = DB::table('subcategory')
    			->join('category','subcategory.category_sub_name','=','category.category_id')
    			->get();
    	// dd($data->toArray());
    	return view('/viewSubcategory',['suball'=>$data]);
    }
}
