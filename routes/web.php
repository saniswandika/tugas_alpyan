<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Media;
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


Route::get('mahasiswa', function () {
    return view('adminMHS.mahasiswa');
})->middleware('checkRole:mahasiswa');
Route::resource('media', MediaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('inputdatamhs', [App\Http\Controllers\MataKuliahController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/lihat', [App\Http\Controllers\LihatDataController::class, 'index']);
Route::get('/lihatdatamhs', [App\Http\Controllers\PembimbingController::class, 'getname']);

Route::get('pembimbing', function () {
    return view('adminpembimbing.pembimbing');
})->middleware(['checkRole:pembimbing']);


Route::get('/lihatsyaratmhs{id}', [App\Http\Controllers\PembimbingController::class, 'index']);
Route::get('form-syarat-pembimbing{id}', [App\Http\Controllers\PembimbingController::class, 'syaratForm']);
Route::POST('form-simpan-pembimbing{id}',  [App\Http\Controllers\PembimbingController::class, 'syaratSimpan']);
Route::get('hasilcari', [App\Http\Controllers\PembimbingController::class, 'getname'])->name('lihatData');
Route::get('role', [App\Http\Controllers\PembimbingController::class, 'rolemhs'])->name('lihatData');

Route::get('BAAK', function () {
    return view('adminBAAK.BAAK');
})->middleware(['checkRole:BAAK']);
Route::get('/lihatmhsbaak{id}', [App\Http\Controllers\AdminBaakController::class, 'index']);
Route::get('form-syarat-baak{id}', [App\Http\Controllers\AdminBaakController::class, 'syaratForm']);
Route::POST('inputdosen{id}', [App\Http\Controllers\AdminBaakController::class, 'inputdosenwali']);
Route::get('role-baak', [App\Http\Controllers\AdminBaakController::class, 'rolemhs'])->name('lihatData');
Route::POST('form-simpan-baak{id}',  [App\Http\Controllers\AdminBaakController::class, 'syaratSimpan']);
Route::get('hasilcari-baak', [App\Http\Controllers\AdminBaakController::class, 'getname'])->name('aku');
Route::get('input_dosen_wali/{id}', [App\Http\Controllers\AdminBaakController::class, 'dosenwali'])->name('input_dosen_wali');
Route::get('matakuliah', [App\Http\Controllers\AdminBaakController::class, 'mata_kuliah']);
Route::POST('inputmatakuliah', [App\Http\Controllers\AdminBaakController::class, 'inputmatakuliah']);
Route::get('tambahmatkul', [App\Http\Controllers\AdminBaakController::class, 'v_tambahmatkul']);
Route::get('/delete{kode_matkul}', [App\Http\Controllers\AdminBaakController::class, 'delete']);

Route::get('BAPSI', function () {
    return view('adminBAPSI.BAPSI');
})->middleware(['checkRole:BAPSI']);
Route::get('/lihatmhsbapsi{id}', [App\Http\Controllers\AdminBapsiController::class, 'index']);
Route::get('form-syarat-bapsi{id}', [App\Http\Controllers\AdminBapsiController::class, 'syaratForm']);
Route::POST('form-simpan-bapsi{id}',  [App\Http\Controllers\AdminBapsiController::class, 'syaratSimpan']);
Route::get('hasilcari-bapsi', [App\Http\Controllers\AdminBapsiController::class, 'getname'])->name('bapsi');
