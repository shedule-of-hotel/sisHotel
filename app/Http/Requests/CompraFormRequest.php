<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
            'id_proveedor'=>'required|max:256',
            'id_usuario'=>'required|max:256',
            'tipo_de_comprobante'=>'required|max:256',
            'serie'=>'required|max:256',
            'estado'=>'required|max:256',
            'fecha'=>'required',
            'sub_total'=>'required',
            'impuesto'=>'required',
            'valor_total'=>'required',
        ];
    }
}
