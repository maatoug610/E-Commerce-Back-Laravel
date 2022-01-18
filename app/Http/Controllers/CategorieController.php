<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
   //Add:
   function addCategorie(Request $req){
    $categorie = new Categorie;

    $categorie->NameCategorie=$req->input('NameCategorie');
    $categorie->Description=$req->input('Description');
 

    $categorie->save();
    return $categorie;
 }

//List:
function listCategorie(){
    return Categorie::all();
}

//Delete :
function deleteCategorie($id){
    $result = Categorie::where('id',$id)->delete();
    if($result){
        return ["result"=>"categorie has been delete"];
    }
    else{
        return ["result"=>"Operation failed !!!!"];
    }
}

//Get Voucher:
function getCategorie($id){
    return Categorie::find($id);
}

//update Voucher:
function updateCategorie(Request $req, Categorie $categorie)
    {
        $req->validate([
            'NameCategorie' => 'required',
            'Description' => 'required'
        ]);
        $categorie->NameCategorie = $req->input('NameCategorie');
        $categorie->Description = $req->input('Description');
        $categorie->save();

        return response()->json([
            'message' => 'Categorie updated!',
            'categorie' => $categorie
        ]);
    }

//Search :
function searchCategorie($key){
    return Categorie::where('NameCategorie','Like',"%$key%")->get();
}
}
