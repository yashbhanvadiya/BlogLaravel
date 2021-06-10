<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class extrasubController extends Controller
{
    public function index()
    {
    	$data = DB::table('category')->get();
    	// dd($data->toArray());

    	return view('extrasub',['category'=>$data]);
    }

    public function getsubdata(Request $req)
    {
    	// dd($req->toArray());

    	$cat = $req->get('cat_id');
    	$getsub = DB::table('subcategory')->where('category_sub_name',$cat)->get();

    	$record = "<option vlaue=''>--Select Subcategory</option>";

    	foreach($getsub as $val)
    	{
    		$record .= '<option value="'.$val->subcategory_id.'">'.$val->subcategory_name.'</option>';
    	}
    	
    	return $record;
    }

    public function extrasubSave(Request $req)
    {
    	$data = array('extra_category_id'=>$req->get('category_sub_id'),'extra_subcategory_id'=>$req->get('extra_subcategory_data'),'extra_sub_name'=>$req->get('extra_category_name'));
    	// dd($req->toArray());
    	DB::table('extracategory')->insert($data);

    	return redirect('/extracategory')->with('msg','Data Inserted Successfully');
    }

    public function extrasub()
    {
    	$data = DB::table('extracategory')
    			->join('category','category.category_id','=','extracategory.extra_category_id')
    			->join('subcategory','subcategory.subcategory_id','=','extracategory.extra_subcategory_id')
    			->get();

    	return view('/showextrasub',['suball'=>$data]);
    }
}
