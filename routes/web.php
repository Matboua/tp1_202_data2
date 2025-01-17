<?php

use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});


// Categories Routes:

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}',[CategorieController::class, 'show'])->where('id', '[0-9]+')->name('categories.show');

Route::get('/categories/edit/{id}', [CategorieController::class, 'edit'])->name('categories.edit');

Route::put('/categories/update/{id}', [CategorieController::class, 'update'])->name('categories.update');

Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Clients Routes:
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

Route::get('/clients/{id}',[ClientController::class, 'show'])->name('clients.show');

Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');

Route::put('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');

Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Produits Routes:
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');

Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

Route::get('/produits/{id}',[ProduitController::class, 'show'])->name('produits.show');

Route::get('/produits/edit/{id}', [ProduitController::class, 'edit'])->name('produits.edit');

Route::put('/produits/update/{id}', [ProduitController::class, 'update'])->name('produits.update');

Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');


// Commandes Routes:
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');

Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');

Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');

Route::get('/commandes/{id}',[CommandeController::class, 'show'])->where('id', '[0-9]+')->name('commandes.show');

Route::get('/commandes/edit/{id}', [CommandeController::class, 'edit'])->where('id', '[0-9]+')->name('commandes.edit');

Route::put('/commandes/update/{id}', [CommandeController::class, 'update'])->where('id', '[0-9]+')->name(name: 'commandes.update');

Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->where('id', '[0-9]+')->name('commandes.destroy');


Route::resource('produits', ProduitController::class);

Route::get('/catalogues', [HomeController::class, 'index'])->name('catalogues.index');

Route::post('/panier/{id}', [PanierController::class, 'add'])->name('panier.add');

Route::post('/panier/increment/{id}', [PanierController::class, 'increment'])->name('panier.increment');

Route::post('/panier/decrement/{id}', [PanierController::class, 'decrement'])->name('panier.decrement');

Route::get('/panier', [PanierController::class, 'show'])->name('panier.show');





