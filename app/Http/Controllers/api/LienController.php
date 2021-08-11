<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lien;
use Illuminate\Support\Facades\DB;

class LienController extends Controller
{
    function afficheliens(){
        
        $lien = Lien::all();
        return response($lien)->header("Access-Control-Allow-Origin",  "*");
    }

    function store(Request $request){
     //   $out = new \Symfony\Component\Console\Output\ConsoleOutput();
       
        foreach($request->input() as $tt){
            $array[] = $tt;
            //$out->writeln($tt);
            $lien = new Lien();
            $lien->lien = $tt;
            $lien->save();
        }
      
        return response($lien)->header("Access-Control-Allow-Origin", "*");
    }
  
    function delete($id){

      $lien =  DB::table('liens')->where('id', '=', $id)->delete();
        return response($lien);

    }

}
