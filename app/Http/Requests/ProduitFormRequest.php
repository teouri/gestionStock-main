<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nom_produit"=>["required","min:3","regex:/^[A-Z]/,unique:produits"],
            "quantite_stock"=>["required","integer"],
            "prix_unitaire_achat"=>["required","integer","min:0"],
            "prix_unitaire_vente"=>["required","integer","min:0"],
        ];
        
    }
}
