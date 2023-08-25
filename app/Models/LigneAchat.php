<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneAchat extends Model
{
    use HasFactory;
    protected $fillable =["id_achat","id_produit",'quantite_achat'];

    function achat()
    {
        return $this->belongsTo(Achat::class);
    }
}
