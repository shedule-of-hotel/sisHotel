<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;/// si esta en verdadero autorizamos al usuario a  hacer el request
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
            'nombre_producto'=>'required|max:50',
            'descripcion'=>'required|max:256',
            'stock'=>'required',
            'precio_venta'=>'required',
            'imagen'=> 'required',
        ];
    }
}
