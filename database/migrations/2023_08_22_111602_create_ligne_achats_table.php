<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ligne_achats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_achat')->foreign("id_achat")->references("id")->on("achats")->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_produit')->foreign("id_produit")->references("id")->on("produits")->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantite_achat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_achats');
    }
};
