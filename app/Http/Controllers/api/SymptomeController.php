<?php

namespace App\Http\Controllers\api;

use App\Models\Symptome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
use App\Http\Resources\Symptome as SymptomeResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class SymptomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symp = Symptome::all();
        return response($symp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $symp = Symptome::all();
        return response($symp)->header("Access-Control-Allow-Origin",  "*");
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
/**
     * Display the specified resource.
     *   
     * @return \Illuminate\Http\Response
     */
    public function showid(Request $tab)
    {
   
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $array = array();
            foreach($tab->input() as $tt){
                $array[] = $tt;
                 
            //  $out->writeln($tt);
            }
            $s = DB::table('associ_m_s')
            ->join('maladies', 'maladies.Id_maladie', '=', 'associ_m_s.Id_maladie')
            ->join('categorie', 'categorie.Id_categorie', '=', 'associ_m_s.Id_categorie')
            ->select('associ_m_s.Id_maladie','maladies.Nom_maladie','maladies.Description_maladie','categorie.Nom_categorie', DB::raw('count(Id_symptome) as total'))
            ->whereIn('Id_symptome',  $array)
            ->orderBy('total', 'DESC')
            ->groupBy('Nom_categorie','Id_maladie' )
            ->distinct('Id_maladie')
            ->take(6)
            ->get();
            
       return Response($s)->header("Access-Control-Allow-Origin",  "*");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptome  $symptome
     * @return \Illuminate\Http\Response
     */
    public function edit(Symptome $symptome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
    

}
