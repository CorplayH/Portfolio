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

// Contact form
Route::group(['namespace' => 'Contact', 'as' => 'contact.'],function(){
    Route::post('/sendContact','ContactFormController@index')->name('sendContact');
});
// Get user info
Route::group(['namespace' =>'Info', 'as' => 'info.' ], function (){
    // home get
    Route::get('/getUserInfo/{uToken}','UserInfoController@index')->name('getUserInfo');
    // about me get
    Route::get('/getAboutMe/{uToken}','AboutMeController@index')->name('getAboutMe');
    // resume get
    Route::get('/getResume/{uToken}','ResumeController@index')->name('getResume');
    // get Portfolio
    Route::get('/getPortfolio/{uToken}','PortfolioController@index')->name('getPortfolio');
});


// Util
Route::group(['middleware' => 'auth','prefix'=>'util' ,'namespace' => 'Util', 'as' => 'util.' ], function(){
    Route::post('/upload','AttachmentController@upload')->name('upload');
    Route::post('/destroy','AttachmentController@destroy')->name('destroy');
});

// User information Editing
Route::group(['middleware' => 'auth','prefix' => 'admin','namespace' => 'Info', 'as' => 'info.'],function(){
    // home
    Route::post('/editUserInfo','UserInfoController@store')->name('editUserInfo');
    Route::post('/editBackground','UserInfoController@storeBackground')->name('storeBackground');
    Route::put('/editBasicInfo/{uToken}','UserInfoController@storeBasicInfo')->name('storeBasicInfo');
    // aboutme
    Route::put('/updateGeneralInfo/{uToken}','AboutMeController@updateGeneralInfo')->name('updateGeneralInfo');
    Route::put('/updateTestimonials/{uToken}','AboutMeController@updateTestimonials')->name('updateTestimonials');
    Route::put('/updateStrength/{uToken}','AboutMeController@updateStrength')->name('updateStrength');
    //resume
    Route::put('/updateEducations/{uToken}','ResumeController@updateEducations')->name('updateEducations');
    Route::put('/updateExperiences/{uToken}','ResumeController@updateExperiences')->name('updateExperiences');
    Route::put('/updateSkills/{uToken}','ResumeController@updateSkills')->name('updateSkills');
    Route::put('/updateCv/{uToken}','ResumeController@updateCv')->name('updateCv');
    // portfolio
    Route::post('/addNewPortfolio/{uToken}','PortfolioController@addNewPortfolio')->name('addNewPortfolio');
    Route::delete('/deletePortfolio/{key}','PortfolioController@delPortfolio')->name('delPortfolio');

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

// admin panel
Route::group(['middleware' => 'auth' ,'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'],function (){
    Route::get('/','AdminController@index')->name('adminHome');
});

// home page
Route::get('/','Home\HomeController@index')->name('Home');
Route::get('/shareButton','Home\HomeController@shareButton')->name('shareButton');
