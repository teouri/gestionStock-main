<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\CommanderController;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\Achat;

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


Route::prefix("patients")->name("patients.")->controller(PatientController::class)->group(function (){
    Route::get('/','index')->name("index");
    Route::get('/create','create')->name("create");
    Route::post('/store','store')->name("store");
    Route::get('/{patient}/edit','edit')->name("edit");
    Route::put('/{patient}/update','update')->name("update");
    Route::delete('/{patient}/destroy','destroy')->name("destroy");
    Route::get('/{patient}/show','show')->name("show");

});

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
Route::prefix("commanders")->name("commanders.")->controller(CommanderController::class)->group(function (){
    Route::get('/',"index")->name("index");
    Route::get('/create',"create")->name("create");
    Route::post('/store',"store")->name("store");
    Route::get('/{commander}/edit',"edit")->name("edit");
    Route::put('/{commander}/update',"update")->name("update");
    Route::put('/{commander}/destroy',"destroy")->name("destroy");
    Route::get('/{commander}/show',"show")->name("show");


});