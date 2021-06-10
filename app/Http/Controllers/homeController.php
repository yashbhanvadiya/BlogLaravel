<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRegistration;

class homeController extends Controller
{

	function index()
	{
		$record = array('title'=>"Home",'heading'=>"This is home page");
		return view('home',['data'=>$record]);
	}

	function user_registration()
	{
		return view('register');
	}

	function record_insert(Request $request)
	{
		// echo "<pre>";
		// // print_r($request->post('name'));
		// print_r($request->name);
		// die;

		$request->validate([
			'name' => 'required|max:100|min:2',
			'email' => 'required|email|unique:user_registrations',
			'gender' => 'required',
			'hobby' => 'required',
			'city' => 'required'
		],
		[
			'name.required' => 'Name is required',
			'name.max' => 'Name must within 100 characters',
			'name.min' => 'Name more then 2 characteers',
			'email.required' => 'Email is required',
			'email.email' => 'Enter valid email',
			'email.unique' => 'Email already taken',
			'gender.required' => 'Select gender',
			'hobby.required' => 'Select hobby',
			'city.required' => 'Select city'
		]);


		$image_name = '';
		if($request->file('image'))
		{
			$file = $request->file('image');
			$image_name = rand(11111,99999).".".$file->getClientOriginalExtension();
			$file->move(public_path('/images/'),$image_name);
		}

		if($request->file('mimages'))
		{
			foreach($request->file('mimages') as $mfile)
			{
				$m_name = rand(11111,99999).".".$mfile->getClientOriginalExtension();
				$mfile->move(public_path('/mimages/'),$m_name);
				$m_im[] = $m_name;
			}
			$m_images = implode(',',$m_im);
		}


		$ur = new UserRegistration;
		$ur->name = $request->name;
		$ur->email = $request->email;
		$ur->gender = $request->gender;
		$ur->hobby = implode(',',$request->hobby);
		$ur->city = $request->city;
		$ur->textarea = $request->textarea;
		$ur->image = $image_name;
		$ur->mimages = $m_images;

		$ur->save();

		return redirect('/register')->with('msg','Record Inserted');

	}


	function fetch_data()
	{
		$data = UserRegistration::paginate(2);

		return view('view',['allData'=>$data]);
	}

	function delete_record($id)
	{
		$data = UserRegistration::where('id',$id)->first();
		$image_path = 'images/'.$data->image;
		if(file_exists($image_path)){
			@unlink($image_path);
		}

		$mimage = explode(',',$data->mimages);
		foreach($mimage as $mim){
			$m_im = "mimages/".$mim;
			if(file_exists($m_im)){
				@unlink($m_im);
			}
		}

		UserRegistration::find($id)->delete();

		return redirect('/fetch_data')->with('msg','Delete Succsessfully');
	}

	function update_record($id)
	{
		$data = UserRegistration::where('id',$id)->first();
		
		return view('/update_register',['single'=>$data]);
	}

	function update_register_data(Request $req)
	{

		$image_name = '';
		if($req->file('image'))
		{
			$file = $req->file('image');
			$image_name = rand(11111,99999).".".$file->getClientOriginalExtension();
			$file->move(public_path('/images/'),$image_name);

			$data_upload = UserRegistration::where('id',$req->id)->first();
			$image_path = 'images/'.$data_upload->image;
			if(file_exists($image_path)){
				@unlink($image_path);
			}
			
		}
		else
		{
			$data_get = UserRegistration::where('id',$req->id)->first();
			$image_name = $data_get->image;
		}

		// multiple image upload

		if($req->file('mimages'))
		{
			foreach($req->file('mimages') as $mfile)
			{
				$m_name = rand(11111,99999).".".$mfile->getClientOriginalExtension();
				$mfile->move(public_path('/mimages/'),$m_name);
				$m_im[] = $m_name;
			}
			$m_images = implode(',',$m_im);

			$data_get = UserRegistration::where('id',$req->id)->first();
			$mimage = explode(',',$data_get->mimages);
			foreach($mimage as $mim){
				$m_im = "mimages/".$mim;
				if(file_exists($m_im)){
					@unlink($m_im);
				}
			}
		}
		else
		{
			$data_get = UserRegistration::where('id',$req->id)->first();
			$m_images = $data_get->mimages;
		}

		

		$data = array('name'=>$req->name, 'email'=>$req->email, 'gender'=>$req->gender, 'hobby'=>implode(',',$req->hobby), 'city'=>$req->city, 'textarea'=>$req->textarea, 'image'=>$image_name, 'mimages'=>$m_images );
		UserRegistration::where('id',$req->id)->update($data);

		return redirect('/fetch_data')->with('msg','Record Update Succsessfully');
	}

	function searchingwithpagi(Request $req)
	{
		//print_r($req->toArray());
		$search = $req->get('search');
		if($search != ''){
			$allData = UserRegistration::where('name','like','%'.$search.'%')->orwhere('email','like','%'.$search.'%')->paginate(2)->setpath('');
			$allData->appends(array('search'=>$req->get('search'))); 
			return view('view',['allData'=>$allData]);
		}

		$data = UserRegistration::paginate(2);

		return view('view',['allData'=>$data]);
	}


	function multipleDelete(request $req)
	{
		$ids = $req->get('MultipleD');

		UserRegistration::wherein('id',$ids)->delete();
		return redirect('/fetch_data')->with('msg','Record Delete Succsessfully');
	}

}
