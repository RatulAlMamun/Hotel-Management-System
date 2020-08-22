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

Route::get('/', 'IndexHomeController@index');
Route::get('/about', 'AboutUSController@about');
Route::get('/facilities', 'FacilitiesController@facilities');
Route::get('/contact', 'ContactController@contact');
Route::get('/rooms', 'RoomsController@room');
Route::get('/reservation', 'ReservationController@reservation');
Route::get('/step2', 'ReservationController@step2');
Route::get('/step3', 'ReservationController@step3');

Route::post('/doreservation', 'ReservationController@doreservation')->name('doreservation.submit');

Route::post('/step2update', 'ReservationController@step2update')->name('step2update.submit');

Route::post('/step3update', 'ReservationController@step3update')->name('step3update.submit');

Route::get('/bookingsingelview/{id}', 'ProfileController@bsingel');
Route::get('/profile', 'ProfileController@profile');
Route::get('/confirmation', 'ProfileController@confirmation');
Route::post('/userlogout', 'Auth\LoginController@userlogout')->name('user.logout');
Auth::routes();



//---admin route ---//

Route::get('/adminlogin', 'AdminLoginController@showAdminLogin')->name('admin.login');
Route::post('/admin/dologin', 'AdminLoginController@login')->name('adminlogin.submit');
Route::post('/admin/adminlogout', 'AdminLoginController@adminlogout')->name('admin.adminlogout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/showrooms', 'HomeController@showrooms')->name('showrooms');

Route::post('/doaddroom', 'HomeController@doaddroom')->name('doaddroom.submit');

Route::post('/docontact', 'ContactController@docontact')->name('docontact.submit');

Route::get('/removeroom/{id}', 'HomeController@removeroom');

Route::post('/doeditroom', 'HomeController@doeditroom')->name('doeditroom.submit');

Route::get('/showbooking', 'HomeController@showbooking');

Route::get('/showbookingconfrimed/{id}', 'HomeController@showbookingconfrimed');

Route::get('/removebooking/{id}', 'HomeController@removebooking');

Route::get('/guest', 'HomeController@viewguest');

Route::get('/staff', 'HomeController@viewstaff');

Route::post('/staffadd', 'HomeController@doaddstaff')->name('doaddstaff.submit');

Route::get('/removestaff/{id}', 'HomeController@removestaff');

Route::get('/removestaff/{id}', 'HomeController@removestaff');

Route::post('/doeditstaff', 'HomeController@doeditstaff')->name('doeditstaff.submit');

Route::get('/expense', 'HomeController@expense');

Route::post('/addcategory', 'HomeController@addcategory')->name('addcategory.submit');

Route::post('/addexpense', 'HomeController@addexpense')->name('addexpense.submit');

Route::post('/editexpense', 'HomeController@editexpense')->name('editexpense.submit');

Route::get('/removeexpense/{id}', 'HomeController@removeexpense');


Route::get('/revenue', 'HomeController@revenue');
Route::get('/messages', 'HomeController@messages');