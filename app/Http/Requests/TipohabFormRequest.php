<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipohabFormRequest extends FormRequest
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
            //
            'nombredeltipo' => 'required|max:50',
            'descripcion_caracteristicas' => 'required|max:256',
            'precio_habitacion' => 'required',
        ];
    }
}
