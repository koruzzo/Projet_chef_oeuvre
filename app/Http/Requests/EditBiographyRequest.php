<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBiographyRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'string', 'max:40'],
            'content' => ['required', 'string', 'max:5000'],
            'secret' => ['required', 'string', 'max:1000'],
            'picture' => ['required', 'image','max:2048','mimes:jpeg,png,jpg,gif']
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le champ titre est requis.',
            'title.max' => 'Le champ titre ne peut pas dépasser :max caractères.',
            'content.required' => 'Le champ contenu est requis.',
            'content.max' => 'Le champ contenu ne peut pas dépasser :max caractères.',
            'picture.image' => 'Le fichier image doit être une image valide.',
            'picture.max' => 'Le fichier image ne peut pas dépasser :max kilo-octets.',
            'picture.mimes' => 'Le fichier image doit être de type :jpeg, .png, .jpg, ou .gif.',
            'picture.required' => 'Le champ picture est requis.',
            'secret.required' => 'Le champ secret est requis.',
            'secret.max' => 'Le champ secret ne peut pas dépasser :max caractères.',
        ];
    }
}
