<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class TraduzioneCustomStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'idLingua' => 'required|integer',
            'chiave' => 'required|string|max:45',
            'valore' => 'required|string|max:45',
        ];
    }
}
