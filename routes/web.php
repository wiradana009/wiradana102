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
    return view('welcome');
});


Route::get('/halaman-satu', function () {
    return view('halaman-satu');
});

Route::get('/halaman-dua', function () {
    return view('halaman-dua');
});

Route::get('/login', function () {
    return view('Users.login');
})->name('login');


route::post('/postlogin' , 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
route::get('/logout' , 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth', 'CheckLevel:superadmin']], function () {
    route::get('/halaman-satu', 'App\Http\Controllers\Homecontroller@halamansatu')->name('halaman-satu');
});

Route::group(['middleware' => ['auth', 'CheckLevel:superadmin,admin']], function () {
    route::get('/home', 'App\Http\Controllers\HomeController@index');   
    route::get('/halaman-dua', 'App\Http\Controllers\Homecontroller@halamandua')->name('halaman-dua');
});

route::get('/data-pasien' , 'App\Http\Controllers\PasienController@index')->name('data-pasien');
route::get('/create-pasien' , 'App\Http\Controllers\PasienController@create')->name('create-pasien');
route::post('/simpan-pasien' , 'App\Http\Controllers\PasienController@store')->name('simpan-pasien');
route::get('/edit-pasien/{id}' , 'App\Http\Controllers\PasienController@edit')->name('edit-pasien');
route::post('/update-pasien/{id}' , 'App\Http\Controllers\PasienController@update')->name('update-pasien');
route::get('/delete-pasien/{id}' , 'App\Http\Controllers\PasienController@destroy')->name('delete-pasien');