<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom d\'utilisateur est requis',
            'email.required' => 'L\'adresse mail est requise',
            'email.unique' => 'Cette adresse mail existe déjà',
            'password.required' => 'Le mot de passe est requies',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères'
        ];
    }
}
