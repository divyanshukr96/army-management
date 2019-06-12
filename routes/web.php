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
    Route::get('add-family', 'FamilyController@index')->name('family.create');

    Route::get('{army}/family', 'NewArmyAddController@family')->name('add.family');
    Route::get('{army}/family/create', 'NewArmyAddController@familyCreate')->name('add.family.create');
    Route::get('{army}/document', 'NewArmyAddController@document')->name('add.document');
    Route::get('{army}/professional', 'NewArmyAddController@professional')->name('add.professional');
    Route::get('{army}/professional/course', 'NewArmyAddController@professionalCourse')->name('add.professional.course');
    Route::get('{army}/professional/punishment', 'NewArmyAddController@professionalPunishment')->name('add.professional.punishment');

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
    Route::post('add-award', 'AwardController@store')->name('award.store');
    Route::post('add-leave', 'LeaveController@store')->name('leave.store');
});

Route::resource('army', 'PersonalDetailController');
