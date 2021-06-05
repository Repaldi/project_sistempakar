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
Route::get('/admin-pakar','PakarController@index')->name('pakarAdmin');;
Route::patch('/admin-pakar/verify', 'PakarController@update')->name('pakarVerify');
Route::get('/admin-pakar/hapus/{id}', 'PakarController@destroy')->name('pakarHapus');

/*
| PENYAKIT
*/
Route::get('/admin-penyakit', 'PenyakitController@admin')->name('penyakitAdmin');
Route::post('/admin-penyakit','PenyakitController@storePenyakit')->name('storePenyakitAdmin');
Route::patch('/admin-penyakit','PenyakitController@updatePenyakit')->name('updatePenyakitAdmin');
Route::get('/admin-penyakit/delete/{id}','PenyakitController@deletePenyakit')->name('deletePenyakitAdmin');

/*
| GEJALA
*/
Route::get('/admin-gejala', 'GejalaController@admin')->name('gejalaAdmin');
Route::post('/admin-gejala','GejalaController@storeGejala')->name('storeGejalaAdmin');
Route::patch('/admin-gejala','GejalaController@updateGejala')->name('updateGejalaAdmin');
Route::get('/admin-gejala/delete/{id}','GejalaController@deleteGejala')->name('deleteGejalaAdmin');
/*
| PENGETAHUAN
*/
Route::get('/admin-pengetahuan', 'PengetahuanController@admin')->name('pengetahuanAdmin');
Route::post('/admin-pengetahuan','PengetahuanController@storePenyakit')->name('storePengetahuanAdmin');


/*------------------------BATAS ROUTE ADMIN-------------------------------*/

/*
|--------------------------------------------------------------------------
| ROUTE PAKAR
|--------------------------------------------------------------------------
| Disini Khusus untuk dashboar Pakar
| 
*/

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
Route::post('/penyakit','PenyakitController@storePenyakit')->name('storePenyakit');
Route::patch('/penyakit','PenyakitController@updatePenyakit')->name('updatePenyakit');
Route::get('/penyakit/delete/{id}','PenyakitController@deletePenyakit')->name('deletePenyakit');

/*
| GEJALA
*/
Route::get('/gejala', 'GejalaController@index')->name('gejala');
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
