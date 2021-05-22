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
| ROUTE ADMIN
|--------------------------------------------------------------------------
| Disini Khusus untuk dashboar ADMIN
| 
*/



/*------------------------BATAS ROUTE ADMIN-------------------------------*/

/*
|--------------------------------------------------------------------------
| ROUTE PAKAR
|--------------------------------------------------------------------------
| Disini Khusus untuk dashboar Pakar
| 
*/
Route::get('/pakar','PakarController@index');
Route::patch('/pakar/verify', 'PakarController@update')->name('pakarVerify');
Route::get('pakar/hapus/{id}', 'PakarController@destroy');

/*
| DASHBOARD DAN PROFIL
*/
Route::post('/home/store', 'ProfilController@storeProfilPakar')->name('storeProfilPakar');
Route::patch('/home/update','ProfilController@updateProfilPakar')->name('updateProfilPakar');
Route::post('/home/store/pakarsyarat', 'ProfilController@storePakarSyarat')->name('storePakarSyarat');

/*
| PENYAKIT
*/
Route::get('/penyakit', 'PenyakitController@index')->name('penyakit');
Route::get('/penyakit', 'PenyakitController@admin')->name('penyakitAdmin');
Route::post('/penyakit','PenyakitController@storePenyakit')->name('storePenyakit');
Route::patch('/penyakit','PenyakitController@updatePenyakit')->name('updatePenyakit');
Route::get('/penyakit/delete/{id}','PenyakitController@deletePenyakit')->name('deletePenyakit');

/*
| GEJALA
*/
Route::get('/gejala', 'GejalaController@index')->name('gejala');
Route::get('/gejala', 'GejalaController@admin')->name('gejalaAdmin');
Route::post('/gejala','GejalaController@storeGejala')->name('storeGejala');
Route::patch('/gejala','GejalaController@updateGejala')->name('updateGejala');
Route::get('/gejala/delete/{id}','GejalaController@deleteGejala')->name('deleteGejala');

/*------------------------BATAS ROUTE PAKAR-------------------------------*/

/*
|--------------------------------------------------------------------------
| ROUTE GLOBAL/PENGGUNA BIASA
|--------------------------------------------------------------------------
| Disini Khusus untuk dashboar global
| 
*/
Route::get('/diagnosis', 'DiagnosisController@index')->name('diagnosis');


/*------------------------BATAS ROUTE GLOBAL------------------------------*/
