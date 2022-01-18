<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable =['Code_Com','Total_Com','status','date_Com'];

    public function Client(){
        return $this->belongsTo(Client::class);
    }

    public function Produit(){
        return $this->belongsTo(Produit::class);
    }

}
