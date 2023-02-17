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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All reservation_emp Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:reservation_emp'])->group(function () {

    Route::get('/reservation_emp/home', [HomeController::class, 'reservation_empHome'])->name('reservation_emp.home');
});

/*------------------------------------------
--------------------------------------------
All kitchen_emp Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:kitchen_emp'])->group(function () {

    Route::get('/kitchen_emp/home', [HomeController::class, 'kitchen_empHome'])->name('kitchen_emp.home');
});