<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactServer;

use  App\Models\contact;
use  App\Models\group;


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

Route::get('/Contact',[ContactServer::class,'index'])->name('Contact.home');;


 Route::get('/newContact',[ContactServer::class,'PgCreateContact'])->name('Contact.Index');
Route::post('/newContact',[ContactServer::class,'PgCreateContactInt'])->name('Contact.Insert');



Route::get('/Contact{id}',[ContactServer::class,'showContact'])->name('Contact.show');




Route::get('/editeContactID={id}',[ContactServer::class,'ShowEditeContact'])->name('Contact.showedite');
Route::put('/editeContactID={id}',[ContactServer::class,'SbmtEditeContact'])->name('Contact.sbmtedite');


Route::delete('/DeletContactID={id}',[ContactServer::class,'deletContact'])->name('Contact.delet');


