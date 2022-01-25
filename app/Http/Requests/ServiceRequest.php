<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'serviceprovider' => 'required|string|max:25',
            'entry' => 'required|date',
            'departure' => 'required|date',
            'diagnosis' => 'required|string|max:30',
            'km' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'serviceprovider.required' => 'O campo prestador de serviço não pode estar vazio.',
            'entry.required' => 'O campo data de entrada não pode estar vazio.',
            'departure.required' => 'O campo data de saída não pode estar vazio.',
            'diagnosis.required' => 'O campo diagnóstico não pode estar vazio.',
            'km.required' => 'O campo km não pode estar vazio.'
        ];
    }
}
