<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required|min:15',
            'body' => 'required',
            'price' => 'required',
            'photos.*' => 'image',
            'categories' => 'required|array|min:1'
           
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'min'=> 'O campo deve ter no mínimo :min caracteres',
            'image' => 'O ficheiro não é válido'
            
        ];
    }
}
