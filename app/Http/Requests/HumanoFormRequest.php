<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HumanoFormRequest extends FormRequest
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
            //reglas del pedidos de datos en el formulario html
            'nombres'=>'required|max:256',
            'apellidos'=>'required|max:256',
            'tipode_documento'=>'required|max:80',
            'n_documento'=>'required|max:50',
            'telefono'=>'max:12',
            'direccion'=>'max:256',
            'email'=>'max:256',
        ];
    }
}
