<?php

use App\Http\Controllers\ContactServer;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

//
Route::get('Contact', [ContactServer::class, 'index'])->name('Contact.index');
Route::get('Contact/newContact', [ContactServer::class, 'create'])->name('Contact.create');
Route::post('Contact/newContact', [ContactServer::class, 'store'])->name('Contact.store');
Route::get('Contact/{contact}', [ContactServer::class, 'show'])->name('Contact.show');
Route::get('Contact/edite/{contact}', [ContactServer::class, 'edit'])->name('Contact.edit');
Route::put('Contact/edite/{contact}', [ContactServer::class, 'update'])->name('Contact.update');
Route::delete('Contact/Delet{contact}', [ContactServer::class, 'destroy'])->name('Contact.destroy');

//Route::resource('Contact', ContactServer::class); //->only('index','create','store');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
