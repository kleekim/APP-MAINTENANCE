<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_complet' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'string', 'max:9'],
            'email' => ['required', 'email', 'max:50'],
            'adresse' => ['required', 'string', 'max:50'],
            'type_clients' => ['required', 'string', 'max:50'],
            'objet' => ['required', 'string', 'max:30'],
            'panne' => ['required', 'string'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom_complet.required' => 'Le nom complet est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'adresse.required' => 'L\'adresse email est obligatoire.',
            'panne.required' => 'La description de la panne est obligatoire.',
            'objet.required' => 'L\'objet de la demande est obligatoire.',
            'type_clients.required' => 'Le type de client est obligatoire.',
        ];
    }
}
