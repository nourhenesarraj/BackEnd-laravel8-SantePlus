<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SymptomeController;
use App\Http\Controllers\api\MaladieController;
use App\Http\Controllers\api\CategorieController;
use App\Http\Controllers\api\UtilisateurController;
use App\Http\Controllers\api\LienController;
use App\Http\Controllers\api\SiteController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('liste', [SymptomeController::class,'create']);
Route::post('symptome', [SymptomeController::class, 'showid']);

Route::post('register' , [UtilisateurController::class , 'register']);
Route::post('connexion',[UtilisateurController::class , 'connexion'] );
Route::get('getuser/{username}',[UtilisateurController::class , 'getUser'] );
Route::put('updateuser',[UtilisateurController::class , 'updateuser'] );

Route::get('afficher/{id}' , [MaladieController::class , 'afficher']);
Route::get('affichersymptome/{id}' , [MaladieController::class , 'affichesymp']);

Route::get('listecategorie', [CategorieController::class,'AfficherCategories']);
Route::get('listemaladies/{id}', [CategorieController::class,'AfficheListeMaladies']);

Route::get('afficherLiens',[LienController::class , 'afficheliens'] );
Route::post('store',[LienController::class , 'store'] );
Route::post('delete/{id}',[LienController::class , 'delete'] );

Route::get('afficheDesc',[SiteController::class , 'afficheDesc'] );
Route::put('update',[SiteController::class , 'update'] );

