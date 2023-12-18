<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class IndirizzoStoreRequest extends FormRequest
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
        return[
            "idContatto" => "required|integer",
            "idTipologiaIndirizzo" => "required|integer",
            "idNazione" => "required|integer",
            "indirizzo" => "required|string|max:255",
            "civico" => "string|max:15",
            "cap" => "string|max:15",
            "localita" => "string|max:255",
            "comune" => "required|string|max:255"
        ];
    }
}
