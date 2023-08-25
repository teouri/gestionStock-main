@php 
    $name= ($achat ?? null) != null ? "update" : "store";
@endphp
<form action="{{route('ligneachats.'.$name, $ligneachat  ?? '' )}}" method="post">
    @if ($produit ?? null)
    @method("PUT")
    @endif
    @csrf
    <div>
        
        <h2>EnregistreAment des lignes d' achat</h2>

        <label for="">Choisir un produit :</label> 
        <select name="id_produit" id="prd"> 
            <option>Produits achetés</option>
                 @foreach($produits as $produit)
                    <option  value="{{ $produit->id}}">{{ $produit->nom_produit}}</option>
                    
                 @endforeach
         </select>
        <br>
        <label for="">Choisir une quantite:</label>
        <select name="quantite_achat" id="qte">
         <option>Quantités d'achat</option>
                 @foreach($produits as $produit)
                    <option value="{{ $produit->quantite_stock}}" >{{ $produit->quantite_stock}}</option>
                 @endforeach
        </select>

        <br>
        
        <button id="btn" type="submit">Enregistrer</button>
        </div>
    
</form>