<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\shipping_companies ;
use App\Models\shipping_token ;

class UserController extends Controller
{
    public function index_SHiping(Request $request , $id){

        /**
         * Recuperation  des Utilisateur :
         *
         */

        try{

            $User = User::findOrFail($id);

            $ShippingComp = $User->shippingTokens()
            ->with('shippingCompany')
            ->get()
            ->pluck('shippingCompany')   // Extraire uniquement les compagnies
            ->unique('id')               // Supprimer doublons
            ->filter();                  // Supprimer les éventuels null

            return response()->json([
                "user" => $User ,
                "shapping"=> $ShippingComp ,
            ]);


        }catch(ERROR){
            echo "erreur" ; 
        }
    }
}
