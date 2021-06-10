<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DynamicDependent extends Controller
{
    function index()
    {
    	$category = DB::table('country_state_city')
    				->groupBy('country')
    				->get(); 

    	return view('dynamicData', ['country'=>$category]);
    }

    function fetch(Request $req)
    {
    	$select = $req->get('select');
    	$value = $req->get('value');
    	$dependent = $req->get('dependent');
    	$data = DB::table('country_state_city')
    			->where($select,$value)		
    			->groupBy($dependent)
    			->get();

    	$output = '<option value="">'.ucfirst($dependent).'</option>';

    	foreach($data as $row){
    		$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';

    		echo $output;
    	}
    }
}
