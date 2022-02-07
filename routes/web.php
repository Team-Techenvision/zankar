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

// Route::get('/', function () {
//     return redirect('/index');
// });

Route::get('/', 'QovexController@logout');




Auth::routes();
Route::get('logout', 'QovexController@logout');

Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');
// Route::get('admin-list', 'AdminController@admin_list');
// Route::get('user-list', 'AdminController@user_list');
Route::get('categories-list', 'AdminController@categories_list');
Route::get('edit-categories/{id}', 'AdminController@editcategories');
Route::get('add-categories', 'AdminController@addcategories');
Route::post('categories-submit', 'AdminController@categoriesSubmit');
// Route::get('{any}', 'QovexController@index');




// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', 'HomeController@index')->name('home');
    
});

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('admin', 'AdminController@admin_list');
    Route::get('user-list', 'AdminController@user_list');
    Route::get('view-user-details/{id}', 'AdminController@user_details');
    Route::get('/home', 'HomeController@index')->name('home'); 

    Route::get('view-medium', 'AdminController@view_medium');
    Route::get('add-medium', 'AdminController@add_medium');
    Route::post('submit-medium', 'AdminController@submit_medium');
    Route::get('edit-medium/{id}', 'AdminController@edit_medium');
    Route::get('delete-medium/{id}', 'AdminController@delete_medium');

    Route::get('view-standard', 'AdminController@view_standard');
    Route::get('add-standard', 'AdminController@add_standard');
    Route::post('submit-standard', 'AdminController@submit_standard');
    Route::get('edit-standard/{id}', 'AdminController@edit_standard');
    Route::get('delete-standard/{id}', 'AdminController@delete_standard');


    // Route::get('view-semister', 'AdminController@view_semister');
    // Route::get('add-semister', 'AdminController@add_semister');
    // Route::post('submit-semister', 'AdminController@submit_semister');
    // Route::get('edit-semister/{id}', 'AdminController@edit_semister');
    // Route::get('delete-semister/{id}', 'AdminController@delete_semister');


    Route::get('view-subject', 'AdminController@view_subject');
    Route::get('add-subject', 'AdminController@add_subject');
    Route::post('submit-subject', 'AdminController@submit_subject');
    Route::get('edit-subject/{id}', 'AdminController@edit_subject');
    Route::get('delete-subject/{id}', 'AdminController@delete_subject');

    Route::get('view-chapter', 'AdminController@view_chapter');
    Route::get('add-chapter', 'AdminController@add_chapter');
    Route::post('submit-chapter', 'AdminController@submit_chapter');
    Route::get('edit-chapter/{id}', 'AdminController@edit_chapter');
    Route::get('delete-chapter/{id}', 'AdminController@delete_chapter');

    Route::get('view-video', 'AdminController@view_video');
    Route::get('add-video', 'AdminController@add_video');
    Route::post('submit-video', 'AdminController@submit_video');
    Route::get('edit-video/{id}', 'AdminController@edit_video');
    Route::get('delete-video/{id}', 'AdminController@delete_video');


    Route::get('view-test-type', 'AdminController@view_test_type');
    Route::get('add-test-type', 'AdminController@add_test_type');
    Route::post('submit-test-type', 'AdminController@submit_test_type');
    Route::get('edit-test-type/{id}', 'AdminController@edit_test_type');
    Route::get('delete-test-type/{id}', 'AdminController@delete_test_type');

    // Route::get('{any}', 'QovexController@logout');
    Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'AdminController@myformAjax'));
    Route::get('myform/getsubject/{id}',array('as'=>'getsubject.ajax','uses'=>'AdminController@getsubject'));
    Route::get('myform/getchapter/{id}',array('as'=>'getchapter.ajax','uses'=>'AdminController@getchapter'));
});

Route::get('{any}', 'QovexController@logout');


