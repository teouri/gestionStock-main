
<button id="btn"><a href="{{ route('achats.create')}}"><i class="bi bi-plus"></i>Ajouter un produit</a></button>
<br>
<table border="3">
    <caption>Liste des produits achetés</caption>
    <thead>
        <tr>
            <th>Date d'achat</th>
            <th>Nom du medicament</th>
            <th>quantité achetée </th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
       
    </thead>
    <tbody>
    @forelse ($listes as $liste)
        <tr>
            <td>{{ $liste->date_achat }}</td>
            <td>{{ $liste->nom_produit}}</td>
            <td>{{ $liste->quantite_achat}}</td>
           
            <td>
                <form action="{{route('ligneachats.edit',$ligneachat)}}" method="get">

                   <button type="submit">Editer</button>
                </form>
            </td>
            <td>
                <form action="{{route('ligneachats.destroy',$ligneachat)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Supprimer</button> 
                </form>
           </td>
        </tr>

    @empty
        <p>Aucun ligne d'achat</p>
    @endforelse
        
    </tbody>
    <tfoot> 
    </tfoot>
</table>

