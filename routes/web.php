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

Route::get('/logout','HomeController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE PAKAR
|--------------------------------------------------------------------------
| Disini Khusus untuk dashboar Pakar
| 
*/

/*
| PROFIL
*/
Route::post('/home/store', 'ProfilController@storeProfilPakar')->name('storeProfilPakar');

/*
| PENYAKIT
*/
Route::get('/penyakit', 'PenyakitController@index')->name('penyakit');
Route::post('/penyakit','PenyakitController@storePenyakit')->name('storePenyakit');
Route::patch('/penyakit','PenyakitController@updatePenyakit')->name('updatePenyakit');
Route::get('/penyakit/delete/{id}','PenyakitController@deletePenyakit')->name('deletePenyakit');
