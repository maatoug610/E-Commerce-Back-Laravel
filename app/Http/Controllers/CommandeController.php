<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //Add:
    function addCommande(Request $req)
    {
        $commande = new Commande;

        $commande->Total_Com = $req->input('Code_Com');
        $commande->Total_Com = $req->input('Total_Com');
        $commande->status = $req->input('status');
        $commande->date_Com = $req->input('date_Com');
        
        
        $commande->save();
        return $commande;
    }

    //List:
    function listCommande()
    {
        return Commande::all();
    }

    //Delete:
    function deleteCommande($commande)
    {
        $result = Commande::where('commande', $commande)->delete();
        if ($result) {
            return ["result" => "Commande has been delete"];
        } else {
            return ["result" => "Operation failed !!!!"];
        }
    }

    //Get:
    function getCommande($commande)
    {
        return Commande::find($commande);
    }

    //Update:
    function updateCommande(Request $req, Commande $commande)
    {
        $req->validate([
            'Code_Com' => 'required',
            'Total_Com' => 'required',
            'status' => 'required',
            'date_Com' => 'required'
            
        ]);
        $commande->Total_Com = $req->input('Code_Com');
        $commande->Total_Com = $req->input('Total_Com');
        $commande->status = $req->input('status');
        $commande->date_Com = $req->input('date_Com');
        
        
        $commande->save();

        return response()->json([
            'message' => 'Commande updated!',
            'commande' => $commande
        ]);
    }
    //Search :
    function searchCommande($key)
    {
        return Commande::where('id', 'Like', "%$key%")->get();
    }
}
