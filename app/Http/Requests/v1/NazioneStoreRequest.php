<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class NazioneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'continente' => 'required|string|max:45',
            'nome' => 'required|string|max:45',
            'iso' => 'required|string|max:2',
            'iso3' => 'required|string|max:3',
        ];
    }
}
