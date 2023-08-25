<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Models\Achat;
use App\Models\Commander;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        //return view('produits.index',["produits"=>Produit::orderBy('nom_produit','asc')]);
        return view('produits.index')->with(["produits"=>Produit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("produits.create");   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //dd($request);
        Produit::create(
            // [
            // 'nom_produit'=>$request->input('nom_produit'),
            // 'quantite_achat'=>$request->input('quantite_achat') ,
            // 'prix_unitaire_achat'=>$request->input('prix_unitaire_achat'),
            // 'prix_unitaire_vente'=>$request->input('prix_unitaire_vente'),
            // ]
            $request->all()
        );

        return redirect()->route("produits.index")->with("success","Le produit a été enregistré avec succès!");
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view("produits.create",compact("produit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->update($request->all());
        return redirect()->route('produits.index')->with("success","Le produit a été bien modifié avec succès!");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with("success","Le produit a été bien supprimé!");
        
    }
    /**
     * Achat
     */
    // public function enregistrer_achat()
    // {
    //     Achat::create(["date_achat" =>now()]);
        
       
    // }
}
