<?php

namespace AguaymantoHotel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitFormRequest extends FormRequest
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
            'nombre_n_habitacion' => 'required|max:50',
            'id_tipodehabitacion' => 'required',
            'estado' => 'required',
        ];
    }
}
