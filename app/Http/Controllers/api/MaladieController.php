<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MaladieController extends Controller
{
    function afficher($id){

        $maladie= DB::table('maladies')
        ->join('associ_m_s' , 'associ_m_s.Id_maladie' , 'maladies.Id_maladie')
        ->join('categorie' , 'categorie.Id_categorie' , 'associ_m_s.Id_categorie')
        ->select('maladies.Nom_maladie' , 'maladies.Description_maladie' , 'categorie.Nom_categorie')
        ->where('maladies.Id_maladie','=',$id)
        ->distinct()
        ->get();
      
        return Response($maladie)->header("Access-Control-Allow-Origin",  "*");
    }

    function affichesymp($id){

        $symptome= DB::table('maladies')
        ->join('associ_m_s' , 'associ_m_s.Id_maladie' , '=' , 'maladies.Id_maladie')
        ->join('symptomes' , 'associ_m_s.Id_symptome' , '=' , 'symptomes.Id_symp')
        ->select('symptomes.Nom_symp')
        ->where('maladies.Id_maladie', '=',$id)
        ->get();

        return Response($symptome)->header("Access-Control-Allow-Origin",  "*");
    }
}
