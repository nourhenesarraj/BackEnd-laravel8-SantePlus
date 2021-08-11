<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class CategorieController extends Controller
{
    function AfficherCategories(){
        $categorie = DB::table('categorie')->get();
        return Response($categorie);
    }

    function AfficheListeMaladies($id){
        $m = DB::table('maladies')
        ->join('associ_m_s' , 'associ_m_s.Id_maladie' , 'maladies.Id_maladie')
        ->join('categorie' , 'categorie.Id_categorie' , 'associ_m_s.Id_categorie')
        ->select('maladies.Nom_maladie' , 'maladies.Description_maladie' , 'maladies.Id_maladie')
        ->where('categorie.Id_categorie','=',$id)
        ->distinct()
        ->get();
        return Response($m)->header("Access-Control-Allow-Origin",  "*");

    }
}
