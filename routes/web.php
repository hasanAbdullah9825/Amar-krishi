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

// Route::get('/', function () {
//      return view('welcome');

   
// });



Route::get('/','WelcomeController@index')->name('welcome');
Route::get('/category/{category}','WelcomeController@categorywisePost')->name('categorywisePost');
Route::post('comment/{post}','CommentsController@store')->name('comment.store');

Route::get('show/{post}','WelcomeController@show')->name('post.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
'as'=>'admin.',
'prefix'=>'admin',
'namespace'=>'Admin',
'middleware'=>['auth','VerifyAdminMiddleware']],
function(){
 Route::get('/dashboard','DashboardController@index')->name('dashboard');
 Route::get('users','UsersController@index')->name('users');
 Route::post('users/{user}','UsersController@makeAdmin')->name('makeAdmin');
 Route::resource('categories','CategoriesController');
 Route::resource('post', 'PostController');

});

Route::group([
    'as'=>'user.',
    'prefix'=>'user',
    'namespace'=>'User',
    'middleware'=>['auth','VerifyUserMiddleware']],
    function(){
        
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::resource('post', 'PostController');
    });
