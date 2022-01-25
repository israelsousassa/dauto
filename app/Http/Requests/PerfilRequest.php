<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'datebirth' => 'required|date',
            'email' => 'required|e-mail',
            'cell' => 'required|string|max:15'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome não pode estar vazio.',
            'lastname.required' => 'O campo sobrenome não pode estar vazio.',
            'datebirth.required' => 'O campo data de nascimento não pode estar vazio.',
            'email.required' => 'O campo email não pode estar vazio.',
            'cell.required' => 'O campo celular não pode estar vazio.'
        ];
    }
}
