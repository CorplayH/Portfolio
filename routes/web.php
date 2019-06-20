<?php

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
//
//Route::get('/admin', function () {
//    return view('backend.master');
//});
//


// Get user info

Route::group(['namespace' =>'Info', 'as' => '.info' ], function (){
    Route::get('/getUserInfo/{uToken}','UserInfoController@index')->name('getUserInfo');
});



// User information Editing
Route::group(['middleware' => 'auth','prefix' => 'admin','namespace' => 'Info', 'as' => '.info'],function(){
    Route::post('/editUserInfo','UserInfoController@store')->name('editUserInfo');
});









// admin panel
Route::group(['middleware' => 'auth' ,'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'],function (){
    Route::get('/','AdminController@index')->name('adminHome');
});

//Change password
Route::put('admin/updateUserPassword','User\UserController@updateUserPassword')->name('updateUserPassword');

//forget password
Route::get('/getEmail','User\ForgetPasswordController@emailPage')->name('emailPage');
Route::post('/getEmail','User\ForgetPasswordController@checkEmail')->name('checkEmail');
Route::post('/resetPassword','User\ForgetPasswordController@restPassword')->name('resetPassword');
Route::get('/resetPassword/{token}','User\ForgetPasswordController@resetPasswordPage')->name('resetPasswordPage');

// Login page
Route::get('/door','Auth\LoginController@index')->name('loginPage');
Route::post('/checkin','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
