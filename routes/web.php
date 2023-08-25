<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\LigneAchatController;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\Achat;
use App\Models\LigneAchat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//routes de produits
Route::prefix("produits")->name("produits.")->controller(ProduitController::class)->group(function (){
    Route::get('/','index')->name("index");
    Route::get('/create','create')->name("create");
    Route::post('/store','store')->name("store");
    Route::get('/{produit}/edit','edit')->name("edit");
    Route::put('/{produit}/update','update')->name("update");
    Route::delete('/{produit}/destroy','destroy')->name("destroy");
    Route::get('/{produit}/show','show')->name("show");


});

//Achats
Route::prefix("achats")->name("achats.")->controller(AchatController::class)->group(function (){
    Route::get('/',"index")->name("index");
    Route::get('/create',"create")->name("create");
    Route::post('/store',"store")->name("store");
    Route::get('/{achat}/edit',"edit")->name("edit");
    Route::put('/{achat}/update',"update")->name("update");
    Route::put('/{achat}/destroy',"destroy")->name("destroy");
    Route::get('/{achat}/show',"show")->name("show");


});
// a simplifier lecriture
Route::prefix("ligne_achats")->name("ligneachats.")->controller(LigneAchatController::class)->group(function (){
    Route::get('/',"index")->name("index");
    Route::get('/create',"create")->name("create");
    Route::post('/store',"store")->name("store");
    Route::get('/{ligneachat}/edit',"edit")->name("edit");
    Route::put('/{ligneachat}/update',"update")->name("update");
    Route::put('/{ligneachat}/destroy',"destroy")->name("destroy");
    Route::get('/{ligneachat}/show',"show")->name("show");


});
