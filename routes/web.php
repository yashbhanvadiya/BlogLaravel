<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/company', function(){
	return view('company');
});	

Route::get('/depe_data','DynamicDependent@index');

Route::post('/dynamicdepe','DynamicDependent@fetch');

Route::get('/cf', function(){
	// $User = new App\MyCustomLibraries\User();
	// $User->MyName();

	Mydata::showfullName();
});

Route::get('/users','UsersController@index');

Route::get('/logout', function(){
	session()->forget('record');
	return redirect('/login');
});

Route::get('/login', function(){

	if(session()->has('record'))
	{
		return redirect('/dashboard');
	}

	return view('login');
});


Route::middleware([Agecheck::class])->group(function(){
	Route::any('/contact', 'testController@contactm');
	Route::any('/about', 'testController@aboutm');
	Route::get('/dashboard', 'testController@dashboard');
});

Route::post('/checklogin','testController@checkdata');

Route::get('/', function () {
    return view('index');
});

Route::get('/agecheck', function(){
	return view('agechecker');
});


Route::get('/register','homeController@user_registration');

Route::post('/data_insert','homeController@record_insert');	 

/*Route::get('/register', function() {
	return view('register');
});*/

/*Route::get('/home', function (){
	return view('home');
});*/

Route::get('/home', 'homeController@index');




Route::get('/fetch_data','homeController@fetch_data');

Route::get('/delete_record/{id}','homeController@delete_record');

Route::get('/update_record/{id}','homecontroller@update_record');

Route::post('/update_register_record','homeController@update_register_data');

Route::any('/searching','homeController@searchingwithpagi');

Route::post('/multipleDeleteRecord','homeController@multipleDelete');


Route::get('/crud','CrudController@create');

Route::resource('/cruds','crudcontroller');

// category, subcategory

Route::get('/category', function(){
	return view('category');
});

Route::post('/categoryData','CategoryController@DataSave');

Route::get('/showCategory','CategoryController@showCategoryRecord');


Route::get('/subcategory','subcategoryController@getsubdata');

Route::post('/subcategoryData','subcategoryController@DataSave');

Route::get('/showsubcategory','subcategoryController@ShowSubrecord');


Route::get('/extracategory','extrasubController@index');

Route::post('/get_subcategory_record','extrasubController@getsubdata');


Route::post('/extrasubcategoryData','extrasubController@extrasubSave');

Route::get('show_extrasubcategory','extrasubController@extrasub');

