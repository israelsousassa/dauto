<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'category' => 'required|string|max:10',
            'type' => 'required|string|max:15',
            'manufacturer' => 'required|string|max:15',
            'model' => 'required|string|max:15',
            'version' => 'required|string|max:30',
            'yearmanufacturer' => 'required|integer',
            'yearmodel' => 'required|integer',
            'potency' => 'nullable|string|max:6',
            'enginecapacity' => 'nullable|integer',
            'transmission' => 'required|string|max:15',
            'steering' => 'required|string|max:15',
            'doors' => 'required|numeric',
            'air' => 'required|numeric',
            'fuel' => 'required|string|max:10',
            'color' => 'required|string|max:20'
        ];
    }

    public function messages()
    {
        return [
            'model.required' => 'O campo modelo não pode estar vazio.',
            'version.required' => 'O campo versão não pode estar vazio.',
            'yearmanufacturer.required' => 'O campo ano fabricação não pode estar vazio.',
            'yearmodel.required' => 'O campo ano modelo não pode estar vazio.'     
        ];
    }
}
