<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //Add:
    function addProduit(Request $req)
    {
        $produit = new Produit;

        $produit->NameProduit = $req->input('NameProduit');
        $produit->PrixProduit = $req->input('PrixProduit');
        $produit->Description = $req->input('Description');
        $produit->ImageProduit = $req->file('ImageProduit')->store('produits');
        $produit->Categorie_id = $req->input('Categorie_id');

        $produit->save();
        return $produit;
    }

    //List:
    function listProduit()
    {
        return Produit::all();
    }

    //Delete :
    function deleteProduit($produit)
    {
        $result = Produit::where('produit', $produit)->delete();
        if ($result) {
            return ["result" => "produit has been delete"];
        } else {
            return ["result" => "Operation failed !!!!"];
        }
    }

    //Get Voucher:
    function getProduit($produit)
    {
        return Produit::find($produit);
        //return new JsonResponse(Produit::find($produit));
    }

    //update Produit

    function updateProduit(Request $req, Produit $produit)
    {
        $req->validate([
            'NameProduit' => 'required',
            'PrixProduit' => 'required',
            'Description' => 'required',
            'Categorie_id' => 'required',
            'ImageProduit' => 'required'
        ]);
        $produit->NameProduit = $req->input('NameProduit');
        $produit->PrixProduit = $req->input('PrixProduit');
        $produit->Description = $req->input('Description');
        $produit->Categorie_id = $req->input('Categorie_id');
        if ($req->file('ImageProduit')) {
            $produit->file_image->file('ImageProduit')->store('produits');
        }
        $produit->save();

        return response()->json([
            'message' => 'Product updated!',
            'produit' => $produit
        ]);
    }
    //Search :
    function searchProduit($key)
    {
        return Produit::where('NameProduit', 'Like', "%$key%")->get();
    }
}
