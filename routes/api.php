<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Register */
Route::post('register',[UserController::class,'register']);
/* Login */
Route::post('login',[UserController::class,'login']); /* Route::post('name of route',['name of controller::class],'name of function'); */


/*********************************************************  Produit ******************************8***************/

/* Add Produit */
Route::post('addProduit',[ProduitController::class,'addProduit']);
/*List Produit */
Route::get('listProduit',[ProduitController::class,'listProduit']);
/* Delete Produit*/
Route::delete('deleteProduit/{id}',[ProduitController::class,'deleteProduit']);
/* Get Produit */
Route::get('getProduit/{id}',[ProduitController::class,'getProduit']);
/* Update Produit */
Route::put('updateProduit/{produit}',[ProduitController::class,'updateProduit']);
/* Search Produit*/
Route::get('searchProduit/{key}',[ProduitController::class,'searchProduit']);




/************************************* Categories ***********************************************8 */
Route::post('addCategorie',[CategorieController::class,'addCategorie']);
Route::get('listCategorie',[CategorieController::class,'listCategorie']);
Route::delete('deleteCategorie/{id}',[CategorieController::class,'deleteCategorie']);
Route::get('getCategorie/{id}',[CategorieController::class,'getCategorie']);
Route::put('updateCategorie/{categorie}',[CategorieController::class,'updateCategorie']);
Route::get('searchCategorie/{key}',[CategorieController::class,'searchCategorie']);


/************************************* Clients ************************************************/
Route::post('addClient',[ClientController::class,'addClient']);
Route::get('listClient',[ClientController::class,'listClient']);
Route::delete('deleteClient/{id}',[ClientController::class,'deleteClient']);
Route::get('getClient/{id}',[ClientController::class,'getClient']);
Route::put('updateClient/{client}',[ClientController::class,'updateClient']);
Route::get('searchClient/{key}',[ClientController::class,'searchClient']);


/************************************* Commandes ************************************************/
Route::post('addCommande',[CommandeController::class,'addCommande']);
Route::get('listCommande',[CommandeController::class,'listCommande']);
Route::delete('deleteCommande/{id}',[CommandeController::class,'deleteCommande']);
Route::get('getCommande/{commande}',[CommandeController::class,'getCommande']);
Route::put('updateCommande/{commande}',[CommandeController::class,'updateCommande']);
Route::get('searchCommande/{key}',[CommandeController::class,'searchCommande']);

