<?php

use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vente_detailsController;
use App\Models\Ventes_details;
use Illuminate\Support\Facades\Route;

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

Route::get('/inscription',function(){return view('utilisateurs.inscription');});
Route::get('/connexion',function(){return view('utilisateurs.connexion');});

Route::get('/boutique', function(){return view('boutiques.boutique');})->middleware('role:admin');
Route::get('/deconnexion',[UserController::class,'deconnexion'])->middleware('role:admin,vendeur,magasinier');
Route::get('/vendre',[Vente_detailsController::class,'vendre_view'])->middleware('role:admin,vendeur,magasinier');
Route::get('/rap_ventes', [Vente_detailsController::class,'rap_ventes_view'])->middleware('role:admin,vendeur,magasinier');
Route::get('/utilisateurs', function(){return view('utilisateurs.gestionnaires');})->middleware('role:admin');
Route::get('/search_ventes',[Vente_detailsController::class,'search_ventes'])->middleware('role:admin,vendeur,magasinier');
Route::get('/myProfil',function(){return view('utilisateurs.myProfil');})->middleware('role:admin,vendeur,magasinier');
Route::get('/myBoutique',function(){return view('boutiques.my_boutique');})->middleware('role:admin');
Route::get('/research_gestionnaires',[UserController::class,'search_gestionnaires'])->middleware('role:admin');
Route::get('/search_produit',[produitController::class,'search_produits'])->middleware('role:admin,vendeur,magasinier');
Route::get('/produits', function(){return view('produits.produits');})->middleware('role:admin,vendeur,magasinier');
Route::get('/rapport_gestionnaires',[UserController::class,'AllGestionnaires'])->middleware('role:admin');
Route::get('/update_gestionnaires/{id}',[UserController::class,'updateGestionnaires_view'])->middleware('role:admin');
Route::get('/rapport_produits',[produitController::class,'Allproduct'])->middleware('role:admin,vendeur,magasinier');
Route::get('produits_edit/{id}', [produitController::class,'updateProduits'])->middleware('role:admin,vendeur,magasinier');
Route::get('/voir_facture/{id}',[Vente_detailsController::class,'voir_factures'])->middleware('role:admin,vendeur,magasinier');
Route::get('/delete_gestionnaire/{id}',[UserController::class,'deleteGestionnaires'])->middleware('role:admin');
Route::get('/delete_ventes/{id}',[Vente_detailsController::class,'deleteVente'])->middleware('role:admin,vendeur,magasinier');
Route::get('/delete_produit/{id}',[produitController::class,'deleteProduits'])->middleware('role:admin,vendeur,magasinier');

Route::post('/inscription_code', [UserController::class,'inscription_code']);
Route::post('/connexion_code', [UserController::class,'connexion_code']);
Route::post('/boutique_insertion',[BoutiqueController::class,'boutique_insertion']);
Route::post('/produit_insertion',[ProduitController::class,'produit_insertion']);
Route::post('/ajout_gestionnaires',[UserController::class,'ajout_gestionnaires']);
Route::post('/product_edit', [produitController::class,'produit_modification']);
Route::post('/update_gestionnaires_traitement',[UserController::class,'updateGestionnairesTraitement']);
Route::post('/boutique_edit',[boutiqueController::class,'modifier_boutique']);
Route::post('/get_product_details',[produitController::class,'get_product_details']);
Route::post('/modifier_profil', [UserController::class,'modifier_profil']);
Route::post('/add_ventes',[Vente_detailsController::class,'addVentes']);

