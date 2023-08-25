{{-- @extends("../dashboard")

@section('content') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@php
    $name= ($achat ?? null) != null ? "update" : "store";
@endphp
<form action="{{route('achats.'.$name, $achat  ?? '' )}}" method="post">
    @if ($produit ?? null)
    @method("PUT")
    @endif
    @csrf
    <div>

        <h2>Enregistrement d'un nouveau achat</h2>

        <label for="">Date d'achat : </label>
        <input type="date" value="{{ $achat->date_achat ?? ''}}" class="@error('date_achat') is-invalid @enderror" name="date_achat">
        <div>
            <select name="" id="" class="produits">
                <option value="">Sélectionner</option>
                @foreach ($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->nom_produit }}</option>
                @endforeach
            </select>
            <input type="number" name="" id="">
            <button type="button">+</button>
        </div>
        <button id="btn" type="submit">Enregistrer</button>
    </div>
    <table border="3">
    <caption>Liste des achats</caption>
    <thead>
        <tr>
            <th>ID </th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
                <input type="text" name="produit[]" value="25" hidden>
                <span>Pr1</span>
            </td>
            <td>
                <input type="text" name="quantite[]" value="5" style="border: none;">
            </td>
        </tr>
        {{-- <tr>
            <td>2</td>
            <td>
                <input type="text" name="produit[]" value="2">
            </td>
            <td>
                <input type="text" name="quantite[]" value="3">
            </td>
        </tr> --}}
    </tbody>
    <tfoot>
    </tfoot>
</table>

</form>

<script type="text/javascript">
    $(document).ready(function() {
      $(".produits").select2();
    });
</script>


{{-- @endsection --}}
