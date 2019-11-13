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


Route::get('/', 'HomeController@index');

//dd(file_exists(storage_path('installed')));

try {
    $register = !\App\User::count();
} catch (Exception $e) {
    $register = true;
}
Auth::routes(['register' => $register]);

Route::get('/home', 'HomeController@home')->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController')->only('index');

    Route::group(['prefix' => 'armies'], function () {
        Route::resource('pending', 'PendingController');
    });


    Route::resource('duties', 'OtherLeaveController', ['names' => [
        'create' => 'duties.new'
    ]]);

    Route::group(['prefix' => 'army/{army}'], function () {
        Route::resource('families', 'FamilyController');

        Route::resource('user', 'ArmyUserController')->only(['store']);

        Route::resource('sarpanch', 'SarpanchController')->except(['index', 'create', 'show']);
        Route::resource('documents', 'DocumentController')->only(['index', 'store', 'destroy']);
        Route::resource('account', 'AccountController')->only(['store', 'edit', 'update', 'destroy']);
        Route::resource('card', 'CSDCardController')->except(['index', 'create', 'show']);
        Route::resource('insurance', 'InsuranceController')->only(['store', 'destroy']);

        Route::resource('address', 'AddressController')->only(['edit', 'update']);

        Route::resource('leaves', 'LeaveController')->only(['create', 'store', 'destroy', 'edit', 'update']);
        Route::resource('courses', 'CourseController')->except('index', 'show');
        Route::resource('awards', 'AwardController')->only(['store', 'destroy']);
        Route::resource('punishments', 'PunishmentController')->except(['index', 'show']); //check this if updates

        Route::resource('professional', 'ProfessionalController')->only(['index', 'store']);

        Route::resource('duties', 'OtherLeaveController')->only(['create', 'store']);
    });

    Route::resource('punishments', 'PunishmentController')->only(['index', 'show']); //check this if updates
    Route::resource('leaves', 'LeaveController')->only(['index', 'show']);
    Route::resource('courses', 'CourseController')->only('index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('armies', 'ArmyController');

    Route::group(['prefix' => 'army/{army}'], function () {

        Route::resource('families', 'FamilyController');

        Route::resource('user', 'ArmyUserController')->only(['update']);
    });
});
