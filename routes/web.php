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

Route::name('credential.')
->namespace('credential')
->prefix('credential')
->group(function () {
    Route::get('/', [App\Http\Controllers\CredentialController::class, 'index'])->name('index');
    Route::get('/list', [App\Http\Controllers\CredentialController::class, 'list'])->name('list');
    Route::post('/register', [App\Http\Controllers\CredentialController::class, 'register'])->name('register');
    Route::delete('delete/{id}', [App\Http\Controllers\CredentialController::class, 'delete'])->name('delete');

});

Route::name('client.')
->namespace('client')
->prefix('client')
->group(function () {
    Route::get('/', [App\Http\Controllers\ClientController::class, 'index'])->name('index');
    Route::get('/load', [App\Http\Controllers\ClientController::class, 'load'])->name('load');
    Route::post('/save', [App\Http\Controllers\ClientController::class, 'save'])->name('save');
   /* Route::post('/register', [App\Http\Controllers\ClientController::class, 'register'])->name('register');
    Route::delete('delete/{id}', [App\Http\Controllers\ClientController::class, 'delete'])->name('delete');
 */
});

Route::name('company.')
->namespace('company')
->prefix('company')
->group(function () {
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('index');
    Route::get('/load', [App\Http\Controllers\CompanyController::class, 'load'])->name('load');
    Route::post('/registerCompany', [App\Http\Controllers\CompanyController::class, 'registerCompany'])->name('registerCompany');
    Route::get('/getInfoCompany/{id}', [App\Http\Controllers\CompanyController::class, 'getInfoCompany'])->name('getInfoCompany');
    Route::post('/updateCompany', [App\Http\Controllers\CompanyController::class, 'updateCompany'])->name('updateCompany');
    /*Route::get('/load', [App\Http\Controllers\CompanyController::class, 'load'])->name('load');
    Route::post('/save', [App\Http\Controllers\CompanyController::class, 'save'])->name('save');
    Route::post('/register', [App\Http\Controllers\CompanyController::class, 'register'])->name('register');
    Route::delete('delete/{id}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('delete');
 */
});

