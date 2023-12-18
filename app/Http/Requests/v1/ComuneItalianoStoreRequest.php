<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ComuneItalianoStoreRequest extends FormRequest
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
            "nome" => "required|string|max:45",
            "regione" => "required|string|max:45",
            "provincia" => "required|string|max:45",
            "metropolitana" => "required|string|max:45",
            "siglaAutomobilistica" => "required|string|max:2",
            "codiceCatastale" => "required|string|max:4",
            "multicap" => "required|integer",
            "capoluogo" => "required|integer",
            "cap" => "required|integer",
            "capFine" => "required|integer",
            "capInizio" => "required|integer",
        ];
    }
}
