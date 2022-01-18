<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable =['NameCategorie','Description'];
    
    public function Produit(){
        return $this->hasMany(Produit::class);
    }
}
