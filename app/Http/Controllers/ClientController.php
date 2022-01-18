<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //Add:
    function addClient(Request $req){
        $client = new Client;
    
        $client->NameClient=$req->input('NameClient');
        $client->email=$req->input('email');
        $client->password= Hash::make($req->input('password'));
        $client->phone=$req->input('phone');
     
    
        $client->save();
        return $client;
     }
    
    //List:
    function listClient(){
        return Client::all();
    }
    
    //Delete :
    function deleteClient($id){
        $result = Client::where('id',$id)->delete();
        if($result){
            return ["result"=>"client has been delete"];
        }
        else{
            return ["result"=>"Operation failed !!!!"];
        }
    }
    
    //Get Client:
    function getClient($id){
        return Client::find($id);
    }
    
    //update Client:
    function updateClient(Request $req, Client $client)
        {
            $req->validate([
                'NameClient' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required'
            ]);
            $client->NameClient = $req->input('NameClient');
            $client->email = $req->input('email');
            $client->password = $req->input('password');
            $client->phone = $req->input('phone');
            $client->save();
    
            return response()->json([
                'message' => 'Client updated!',
                'client' => $client
            ]);
        }
    
    //Search :
    function searchClient($key){
        return Client::where('NameClient','Like',"%$key%")->get();
    }
}
