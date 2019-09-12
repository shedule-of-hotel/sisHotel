<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// si esta en verdadero autorizamos al usuario a  hacer el request
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
            'id_habitacion'=>'required|max:10',
            'id_cliente'=>'required|max:10',
            'id_empleado'=>'required|max:10',
            'fecha_de_reserva'=>'required',
            'fecha_de_ingreso'=>'required', 
            'fecha_de_salida'=>'required',
            'costo_total'=>'required',
            'estado_de_reserva'=>'required|max:256',
            'notas_de_reserva'=>'required|max:256',
        ];
    }
}
