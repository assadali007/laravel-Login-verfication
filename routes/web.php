<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\form\Main;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\session\SessionMain;
use App\Mail\Emailtest;

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
// =============================================================================================== Login
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/',[Main::class,'index'])->name('index');
Route::get('/login_form',[Main::class,'loginform'])->name('loginform');
Route::post('/form_login_submit',[Main::class,'form_login_submit'])->name('form_login_submit');

Route::get('/home',[Main::class,'home'])->name('home');

Route::get('/logout',[Main::class,'logout'])->name('logout');

Route::get('/edit/{id}',[Main::class,'edit'])->name('edit');
// upload image
Route::post('/upload',[Main::class,'upload'])->name('main_upload');

//download file
Route::get('list_file',[Main::class,'list_files'])->name('main_list_file');
Route::get('/download/{file}',[Main::class,'download'])->name('main_download');

// ================================================================================================= Session
//Route::get('access_data',[SessionMain::class,'AcessAllData'])->name('AcessAllData');

//Route::get('store_data',[SessionMain::class,'storeData'])->name('storeData');

//Route::get('single_data',[SessionMain::class,'getSingleData'])->name('getSingleData');
//Route::get('delete_data',[SessionMain::class,'deleteData'])->name('deleteData');

// ========================================================================== email sent

Route::get('/aaa', function () {
   Mail::to('asadaali065@gmail.com')->send(new Emailtest());
   echo 'Email send';
});
