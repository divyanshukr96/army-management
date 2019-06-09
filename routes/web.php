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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view('admin');
})->name('home');

Route::resource('users', 'UserController');



//Route::prefix('army')->group(function () {
//    Route::get('add-family', 'FamilyController@index')->name('family.create');
//    Route::post('add-family', 'FamilyController@store')->name('family.store');
//    Route::get('add-family-edit/{fami}', 'FamilyController@index')->name('family.edit');
//    Route::post('add-document', 'DocumentController@store')->name('document.store');
//    Route::post('add-card', 'CSDCardController@store')->name('card.store');
//    Route::post('add-insurance', 'InsuranceController@store')->name('insurance.store');
//    Route::post('add-account', 'AccountController@store')->name('account.store');
//    Route::post('add-course', 'CourseController@store')->name('course.store');
//    Route::post('add-punishment', 'PunishmentController@store')->name('punishment.store');
//    Route::post('add-sarpanch', 'SarpanchController@store')->name('sarpanch.store');
//});

Route::prefix('army/new')->group(function () {
    Route::get('/{page}', 'FamilyController@index1')->name('add.detail');

    Route::get('add-family', 'FamilyController@index')->name('family.create');
    Route::post('add-family', 'FamilyController@store')->name('family.store');
    Route::get('add-family-edit/{fami}', 'FamilyController@index')->name('family.edit');
    Route::post('add-document', 'DocumentController@store')->name('document.store');
    Route::post('add-card', 'CSDCardController@store')->name('card.store');
    Route::post('add-insurance', 'InsuranceController@store')->name('insurance.store');
    Route::post('add-account', 'AccountController@store')->name('account.store');
    Route::post('add-course', 'CourseController@store')->name('course.store');
    Route::post('add-punishment', 'PunishmentController@store')->name('punishment.store');
    Route::post('add-sarpanch', 'SarpanchController@store')->name('sarpanch.store');
});

Route::resource('army', 'PersonalDetailController');
