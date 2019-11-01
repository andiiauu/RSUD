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

Route::get('', function () {
    return view('welcome');
});


Route::get('home', 'HomeController@index')->name('home');

Auth::routes();

//Pasien

Route::get('pasien', 'PasienController@index');
Route::post('pasien/create', 'PasienController@create');
Route::POST('pasien/dokterByPoli', 'DokterController@getdokter');
Route::get('pasien/{id}/Pasienedit', 'PasienController@edit');
Route::patch('pasien/{id}/update', 'PasienController@update')->name('pasien.update');
Route::get('pasien/{id}/detailpasien', 'PasienController@detailpasien');
Route::post('pasien/{id}/tindakan', 'PasienController@tindakan');
Route::delete('pasien/{id}/delete', 'PasienController@destroy')->name('pasien.destroy');

//Pasieninap

Route::get('pasieninap', 'PasieninapController@index');
Route::post('pasieninap/create', 'PasieninapController@create');
Route::post('pasieninap/kamarByKategori', 'KamarController@getkamar');
Route::patch('pasieninap/{id}/update', 'PasieninapController@update')->name('pasieninap.update');
Route::get('pasieninap/{id}/detail', 'PasieninapController@detail');
Route::delete('pasieninap/{id}/delete', 'PasieninapController@destroy')->name('pasieninap.destroy');


// Poli

Route::get('poli', 'PoliController@index');
Route::post('poli/create', 'PoliController@create');
Route::patch('poli/{id}/update', 'PoliController@update')->name('poli.update');
Route::get('poli/{id}/detailpoli', 'PoliController@detailpoli');
Route::delete('poli/{id}/delete', 'PoliController@destroy')->name('poli.destroy');

// Dokter

Route::get('dokter', 'DokterController@index');
Route::post('dokter/create', 'DokterController@create');
Route::patch('dokter/{id}/update', 'DokterController@update')->name('dokter.update');
Route::get('dokter/{id}/detaildokter', 'DokterController@detaildokter');
Route::delete('dokter/{id}/delete', 'DokterController@destroy')->name('dokter.destroy');


//Obat

Route::get('obat', 'ObatController@obat');
Route::patch('obat/{id}/update', 'ObatController@updateobat')->name('obat.update');
Route::post('obat/create', 'ObatController@createobat');
Route::get('obat/{id}/detail' , 'ObatController@detailobat')->name('obat.show');
Route::delete('obat/{id}/delete', 'ObatController@destroyobat')->name('obat.destroy');



//Kategoriobat

Route::get('kategoriobat', 'ObatController@kategori');
Route::post('kategoriobat/create', 'ObatController@createkategori');
Route::get('kategoriobat/{id}/detail' , 'ObatController@detailkategori');
Route::delete('kategoriobat/{id}/delete', 'ObatController@destroykategoriobat')->name('kategoriobat.destroy');

//Supplier

Route::get('supplier', 'SupplierController@index');
Route::post('supplier/create', 'SupplierController@create');
Route::patch('supplier/{id}/update', 'SupplierController@update')->name('supplier.update');
Route::delete('supplier/{id}/delete', 'SupplierController@destroy')->name('supplier.destroy');

//Stok

Route::get('stok', 'StokController@index');
Route::post('stok/supplier', 'StokController@supplier')->name('stok.supplier');
Route::get('stok/kartu', 'StokController@kartuStok');
Route::post('stok/kartu', 'StokController@addStok');

//Penjualan

Route::get('penjualan','PenjualanController@index');
Route::get('penjualan/create','PenjualanController@create');
Route::post('penjualan','PenjualanController@store')->name('penjualan.store');
Route::get('penjualan/update', 'PenjualanController@update')->name('penjualan.update');



//KategoriKamar

Route::get('kategorikamar', 'KamarController@kategori');
Route::get('kategorikamar/{id}/detail', 'KamarController@detailkategori');
Route::delete('kategorikamar/{id}/delete', 'KamarController@destroykategorikamar')->name('kategorikamar.destroy');

//Kamar

Route::get('kamar', 'KamarController@kamar');
Route::post('kamar/create', 'KamarController@createkamar');
// Route::patch('kamar/{id}/update', 'KamarController@update')->name('kamar.update');
Route::get('kamar/{id}/detail', 'KamarController@detailkamar');
Route::delete('kamar/{id}/delete', 'KamarController@destroykamar')->name('kamar.destroy');
