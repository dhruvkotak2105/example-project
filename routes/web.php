<?php

use Illuminate\Support\Facades\Route;
use App\Facades\TestFacades;





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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Profile'], function(){
    Route::resource('profile', 'ProfileController')->middleware('auth');
    Route::get('/profile/preview-image', 'ProfileController@previewImage')->name('profile.preview-image');
});

Route::group(['namespace' => 'Document'], function(){
    Route::resource('document', 'DocumentController');
});

Route::get('/facade-test', function() {
    return TestFacades::testMethod();
});

Route::get('/stores', 'StoreController@index')->name('stores');





