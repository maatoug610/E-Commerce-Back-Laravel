<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable =['NameProduit','PrixProduit','ImageProduit','Description'];

    public function Categorie(){
        return $this->belongsTo(Categorie::class);
    }
    
    public function Commande(){
        return $this->hasMany(Commande::class);
    }


}
