<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=['nom_produit','quantite_stock','prix_unitaire_achat','prix_unitaire_vente'];
    
    function achats() : BelongsToMany
    {
        return $this->belongsToMany(Achat::class);
    }
}
