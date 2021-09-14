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

 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ClientController::class, 'welcome'])->name('welcome');
Route::get('/contact', [App\Http\Controllers\ClientController::class, 'contact'])->name('contact');
Route::get('/apropos', [App\Http\Controllers\ClientController::class, 'apropos'])->name('apropos');
Route::get('/produits', [App\Http\Controllers\ClientController::class, 'produits'])->name('produits');
 
Route::get('/admin/ajouter-produit', [App\Http\Controllers\ProductController::class, 'addProduit'])->name('dashboard.addProduit');
Route::post('/admin/save-produit', [App\Http\Controllers\ProductController::class, 'saveProduit'])->name('dashboard.saveProduit');
Route::get('/admin/produits', [App\Http\Controllers\ProductController::class, 'produits'])->name('dashboard.produits');
Route::get('/admin/editProduit/{id}', [App\Http\Controllers\ProductController::class, 'editProduit'])->name('dashboard.editProduit');
Route::post('/admin/updateProduit', [App\Http\Controllers\ProductController::class, 'updateProduit'])->name('dashboard.updateProduit');
Route::get('/admin/deleteProduit/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduit'])->name('dashboard.deleteProduit');
Route::get('/admin/editProduit/{id}', [App\Http\Controllers\ProductController::class, 'editProduit'])->name('dashboard.editProduit');
Route::get('/admin/disableProduit/{id}', [App\Http\Controllers\ProductController::class, 'disableProduit'])->name('dashboard.disableProduit');
Route::get('/admin/enableProduit/{id}', [App\Http\Controllers\ProductController::class, 'enableProduit'])->name('dashboard.enableProduit');
