<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Produit;
use App\Models\LigneAchat;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("achats.index")->with(["achats"=>Achat::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //les prds
        $produits=Produit::all();
        return view("achats.create",compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $achat=Achat::create();
        for($i=0; $i<count($request->produit); $i++){
            LigneAchat::create([
                'id_achat' => $achat->id,
                'id_produit' => $request->produit[$i],
                'quantite_achat' => $request->quantite[$i],
            ]);
        }


        // $quantites=$request->input('quantite_achat');
        // foreach ($quantites as $produitId => $quantite) {
        //     if ($quantite >0) {
        //        // $achat->produits()->attach($request->input('produits'));
        //        $achat->produits()->attach('produitId',['quantite'=>$quantite]);
        //     }
        //}
        //comment
        return view("ligneachats.create",['produits'=>$produits,'success'=>'Achat  éffectué avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achat $achat)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achat $achat)
    {
        return view("achats.create",compact('achat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achat $achat)
    {
       $achat->update($request->input('date_achat'));
       return redirect()->route("achats.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achat $achat)
    {
        //
    }
}
