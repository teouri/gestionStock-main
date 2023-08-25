
<button id="btn"><a href="{{ route('achats.create')}}">Ajouter un achat</a></button>
<br>
<br>
<table border="3">
    <caption>Liste des achats</caption>
    <thead>
        <tr>
            <th>ID achat </th>
            <th>Date d'achat</th>
           
            <th>Actions</th>
           
        </tr>
       
    </thead>
    <tbody>
    @forelse ($achats as $achat)
        <tr>
          <td>{{ $achat->id}}</td>
            <td>{{ $achat->date_achat }}</td>
            <td>
                <form action="{{route('ligneachats.create')}}" method="get">

                   <button type="submit">Ajouter une ligne </button>
                   
                </form>
            
                <form action="{{route('achats.edit',$achat)}}" method="get">

                   <button type="submit">Editer</button>
                </form>
                
                <form action="{{route('achats.destroy',$achat)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Supprimer</button> 
                </form>
           </td>
        </tr>

    @empty
        <p>Aucun achat</p>
    @endforelse
        
    </tbody>
    <tfoot> 
    </tfoot>
</table>

