<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'surname' => 'required',
            'email' => 'required',
            'deliveryAddress' => 'required',
            'password' => 'required',
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'nombre del cliente',
            'surname' => 'apellido del cliente',
            'email' => 'email del cliente',
            'deliveryAddress' => 'dirección del cliente',
            'password' => 'contraseña del cliente',
        ];
    }

}
