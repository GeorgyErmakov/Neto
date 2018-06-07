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

Route::get('/', 'Questions@faqList');
Route::post('/', 'Questions@fillQuestion');
Route::get('/admin', 'Questions@showAllAdmin');
Route::any('newadmin', 'Questions@addAdmin')->name("newadmin");
Route::get('deladmin', 'Questions@delAdmin')->name("deladmin");
Route::any('newsubject', 'Questions@newSubject')->name("newsubject");
Route::any('delsubject', 'Questions@delSubject')->name("delsubject");
Route::any('changequestion', 'Questions@chQ')->name("changequestion");

//Route::get('user/{id}', function ($id) {  // })->where('id', '[0-9]+'); 
Auth::routes();

