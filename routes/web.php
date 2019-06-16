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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

    Route::group(['prefix' => 'armies'], function () {
        Route::resource('pending', 'PendingController');
    });

    Route::resource('armies', 'ArmyController');

    Route::group(['prefix' => 'army/{army}'], function () {
        Route::resource('families', 'FamilyController');
        Route::resource('sarpanch', 'SarpanchController')->except(['index', 'create', 'show']);
        Route::resource('documents', 'DocumentController')->only(['index', 'store', 'destroy']);
        Route::resource('account', 'AccountController')->only(['store', 'edit', 'update', 'destroy']);
        Route::resource('card', 'CSDCardController')->except(['index', 'create', 'show']);
        Route::resource('insurance', 'InsuranceController')->only(['store', 'destroy']);

        Route::resource('address', 'AddressController')->only(['edit', 'update']);

        Route::resource('leaves', 'LeaveController')->only(['create', 'store', 'destroy']);
        Route::resource('courses', 'CourseController')->except('index', 'show');
        Route::resource('awards', 'AwardController')->only(['store', 'destroy']);
        Route::resource('punishments', 'PunishmentController')->except(['index', 'show']); //check this if updates

        Route::resource('professional', 'ProfessionalController')->only(['index', 'store']);
    });

    Route::resource('punishments', 'PunishmentController')->only(['index', 'show']); //check this if updates
    Route::resource('leaves', 'LeaveController')->only(['index', 'show']);
});
