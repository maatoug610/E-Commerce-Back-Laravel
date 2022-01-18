<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable =['NameClient','email','password','phone'];
    
    public function Commande(){
        return $this->hasMany(Commande::class);
    }
}
