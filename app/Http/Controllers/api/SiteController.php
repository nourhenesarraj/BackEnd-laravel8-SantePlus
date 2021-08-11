<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
     function afficheDesc(){

        $site = DB::table('site')
        ->select('description' , 'email' , 'localisation' , 'siteweb')
        ->where('id' ,'=' , 1)
        ->get();
        return response()->json([
            'site' => $site
         ])->header("Access-Control-Allow-Origin",  "*");
    }
    function update(Request $request){

          $site = DB::table('site')
              ->where('id', 1)
              ->update(['description' => $request->input('description')
            , 'email' => $request->input('email')
            ,'localisation' => $request->input('localisation'),
            'siteweb' =>  $request->input('siteweb')
            ]);
      
        return Response($site)->header("Access-Control-Allow-Origin",  "*");


    }
}
