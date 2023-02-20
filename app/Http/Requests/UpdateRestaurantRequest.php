<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100', Rule::unique('restaurants')->ignore($this->restaurant)],
            'address' => 'required|max:255',
            'vat' => 'required|min:11|max:11',
            'email' => ['required','email','max:255',Rule::unique('restaurants')->ignore($this->restaurant)],
            'phone' => 'nullable|max:20|min:10',
            'opening_hours' => 'required|max:20',
            'closing_hours' => 'required|max:20',
            'opening_days' => 'required|max:100',
            'image' => 'nullable|image|max:2048',
            'website' => 'nullable',
            'description' => 'nullable',
            

        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'È richiesto un nome di minimo 5 lettere',
            'name.unique:restaurants' => 'Il nome deve essere unico',
            'name.max' => 'Il nome può avere una lunghezza massima di :max lettere',
            'name.min' => 'Il nome deve avere una lunghezza minima di :min lettere',
            'address.required' => 'È richiesto un indirizzo',
            'address.unique:restaurants' => 'Indirizzo già utilizzato',
            'vat.required' => 'La P.IVA è richiesta',
            'vat.unique' => 'P.IVA già registrata',
            'vat.min' => 'La P.IVA deve avere una lunghezza di 11 caratteri',
            'vat.max' => 'La P.IVA deve avere una lunghezza di 11 caratteri',
            'email.required' => 'Il campo Email è richiesto',
            'email.unique:restaurants' => 'Email già registrata',
            'email.max' => 'La lunghezza dell\'email non può eccedere i 50 caratteri',
           
            'image.max' => 'L\immagine non può superare i 2MB di peso',
            'phone.max' => 'Il numero di telefono non può eccedere i :max caratteri',
            'phone.min' => 'Il numero di telefono deve essere lungo almeno :min caratteri',

        ];
    }
}