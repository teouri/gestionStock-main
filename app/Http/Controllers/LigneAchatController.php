<?php

namespace App\Http\Controllers;

use App\Models\LigneAchat;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigneAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
       
       //$produits=collect([]);
        $id_achat =DB::table('achats')->max('id');

        $prds_ligne=LigneAchat::select(['id_produit','quantite_achat'])->where('id_achat','=', $id_achat)->get();
        //$id_prds=DB::table('ligne_achats')->pluck('id_produit')->where(['id_achat','=', $id_achat]);
        //dd($ids);
        foreach ($prds_ligne as $prd) {
            $id=$prd->id_produit;
            //dd($id);
            $noms=Produit::select('nom_produit')->where('id','=',$id)->get();
            //$nom=DB::table('produits')->pluck('nom_produit')->where(['id_produit','=', $id]);
           $produits=$noms;
        }

        // $prds=[];
        foreach ($produits as $nom) {
         
           dd($nom->nom_produit);
        }
        return $produits;

        
        //$produits=DB::table()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits=Produit::all();
        return view('ligneachats.create',compact('produits'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_achat =DB::table('achats')->max('id');
        DB::table('ligne_achats')->insert([
            'id_achat'=>$id_achat,
            'id_produit'=>$request->input('id_produit'),
            'quantite_achat'=>$request->input('quantite_achat'),
        ]);

        //$produits=DB::table('produits')->pluck('nom_produit')->where(['id_achat','=', $id_achat]);
        return redirect()->route("ligneachats.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(LigneAchat $ligneachat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LigneAchat $ligneachat)
    {
        return view("ligneachats.create",compact("ligneachat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LigneAchat $ligneachat)
    {
        
        $ligneachat->update($request->all());
        return redirect()->route('ligneachats.index')->with("success","La ligne d'achat a été bien modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LigneAchat $ligneachat)
    {
        $ligneachat->delete();
        
        return redirect()->route('ligneachats.index')->with("success","La ligne d'achat a été bien supprimé avec succès!");

    }
}
