<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:128']
        ];
    }

    public function messages()
    {
        return [
            '*.required' => "Preencha o campo :attribute",
            '*.max' => "Precisa ter no máximo :min caracteres para o campo :attribute"
        ];
    }
}
