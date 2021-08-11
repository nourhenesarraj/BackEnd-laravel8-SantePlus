<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{

    private $apiToken;
    public function __construct()
     {
     $this->apiToken = uniqid(base64_encode(Str::random(40)));
     }
    function register(Request $request){
    
        $usercheck = DB::table('utilisateurs')
        ->where('nom_utilisateur' , '=' , $request->input('nom_utilisateur'))
        ->get();
       // $out->writeln($usercheck);
       if(count($usercheck ) > 0){
           return "1";
       }else{
           $postArray = $request->all();
           $postArray['mdp'] = bcrypt($postArray['mdp']);
           $user = Utilisateur::create($postArray);
           $success['nom_utilisateur'] =  $user->nom_utilisateur;
           return response()->json([
            'status' => 'success',
            'data' => $success,
          ])->header("Access-Control-Allow-Origin", "*");
        
       }
    }


    public function connexion(Request  $request){
           // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln($request->nom_utilisateur);
    
        $login = $request->nom_utilisateur ;
        $mdp = $request->mdp;
        $admin = Utilisateur::where('nom_utilisateur',$login)->get();
      
        if( count($admin) > 0){
          
        if (Hash::check($mdp, $admin[0]->mdp)) {
            $success['token'] =  $this->apiToken;
            $success['nom_utilisateur'] = $admin[0]->nom_utilisateur;
            return response($success)->header("Access-Control-Allow-Origin", "*");
         
        }
    else{
            return Response("mot de passe incorrect");
         
        }
    }
    else{
        return Response("n'existe pas le compte"); 
    }
}

    function getUser($username){
        
        $user = DB::table('utilisateurs')->where('nom_utilisateur' , '=' , $username)->get();
        return response($user)->header("Access-Control-Allow-Origin", "*");

}

    function updateuser(Request $request){
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $nomuser = $request->input('nom_utilisateur');
        $nom = $request->input('nom');
        $email = $request->input('email');
        $prenom = $request->input('prenom');
        $mdp = bcrypt($request->input('mdp'));
        $user = DB::table('utilisateurs')
        ->where('nom_utilisateur' , $nomuser)->update(['nom' => $nom, 'mdp' => $mdp  ,
        'email' => $email , 'prenom' => $prenom , 'nom_utilisateur' => $nomuser]);
    
  return Response($user)->header("Access-Control-Allow-Origin",  "*");
    }
    
    
    }
