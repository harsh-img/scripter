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


	Route::get('/', "HomeController@index");
	Route::get('/components', "HomeController@skills")->name('skills');
	Route::match(['get','post'],'/botman','HomeController@handle')->name('botman');

	// Route::get('/', [App\Http\Controllers\HomeController::class, 'count'])->name('home');

	Route::get('/download-resume', 'Admin\AboutController@download')->name('resume.download');
	Route::get('/scroll-to-contact', 'HomeController@scrollToContact')->name('scroll.to.contact');
	Route::post('/form-submit', 'HomeController@contactform')->name('submit.form');

	Route::get('login', 'Auth\LoginController@showLoginForm');
	Route::post('login', 'Auth\LoginController@login')->name('login'); 
	Route::match(['get','post'],'/register', 'Auth\RegisterController@register')->name('register');

	// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Github login
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

//language
Route::post('language',[\App\Http\Controllers\HomeController::class,'localization'])->name('language');


	Route::match(['get','post'],'/change-password', 'Admin\AdminController@changePassword')->name('changepassword');
 
	Route::group(['prefix'=>'admin','as'=>'admin','middleware'=>['auth','checkadmin'],'as'=>'admin.'],function() {
		
		Route::match(['get','post'],'/logout','Auth\LoginController@logout')->name('logout');
		Route::match(['get','post'],'/dashboard', 'Admin\DashboardController@index');
 
			Route::group(['prefix'=>'about-me'],function(){

				Route::match(['get','post'],'add','Admin\AboutController@addAbout')->name('about-me.add');
				Route::get('list','Admin\AboutController@aboutlist');
				Route::get('about-delete/{id}','Admin\AboutController@deleteabout');

			});

			//Testimonials routes
			Route::group(['prefix'=>'testimonial'],function() {
				Route::match(['get','post'],'add', 'Admin\TestimonialController@add')->name('testimonial.add');
				Route::get('list', 'Admin\TestimonialController@testimonialList');
				route::post('change-status','Admin\TestimonialController@changestatus')->name('testimonial.changestatus');
				Route::get('update/{id}','Admin\TestimonialController@update');
				Route::get('delete/{id}','Admin\TestimonialController@destroy');
				Route::post('change-order','Admin\TestimonialController@changeorder')->name('testimonial.change-order');
			});

			Route::get('contact','Admin\ContactController@contactlist');
			Route::get('contact/{id}','Admin\ContactController@deletecontact');

			//Recycle bin
			Route::get('recycle','Admin\RestoreController@showdeltedata');
			Route::post('/restore', 'Admin\RestoreController@restore')->name('restore');
			Route::get('permanent-delete/{id}','Admin\RestoreController@permanentdelete')->name('permanent');
			


			
	});


	Route::match(['get','post'],'/logout','Auth\LoginController@logout')->name('logout');
