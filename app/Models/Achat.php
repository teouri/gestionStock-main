<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Achat extends Model
{
    use HasFactory;
    protected $fillable=["date_achat",];

    // function produits():BelongsToMany
    // {
    //     return $this->belongsToMany(Produit::class,'commanders',"id_achat",'id_produit');
    //     //->withPivot('quantite_achat')
    // }
    function ligneachats()
    {
        return $this->hasMany(LigneAchat::class);
    }
}
