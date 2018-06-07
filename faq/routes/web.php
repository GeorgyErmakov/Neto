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

Route::get('/a', function () {
 return Twig::render('./indexlogin.twig');
});

//Route::post('/', function () {

//echo "ok";

   // return view('welcome');
//});

Route::get('/', 'Questions@faqList')->name("user");
Route::post('/', 'Questions@fillQuestion');
Route::get('/admin', 'Questions@showAllAdmin')->name("admin");
Route::any('newadmin', 'Questions@addAdmin')->name("newadmin");
Route::get('deladmin', 'Questions@chAdmin')->name("chadmin");
Route::any('newsubject', 'Questions@newSubject')->name("newsubject");
Route::any('delsubject', 'Questions@delSubject')->name("delsubject");
Route::any('changequestion', 'Questions@chQ')->name("changequestion");
Route::any('/test', 'TestController@runTest')->name("test");
Route::any('/filternonaswered', 'Questions@shownonaAdmin')->name("nonanswered");
Route::any('/filterednonpublished', 'Questions@shownonpAdmin')->name("nonpublished");
Route::any('/auth/login', 'FAQAuthController@authenticate')->name("auth");
Route::any('/logout', 'FAQAuthController@logout')->name("logout");




//Auth::routes();

