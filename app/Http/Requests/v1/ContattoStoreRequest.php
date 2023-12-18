<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ContattoStoreRequest extends FormRequest
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
            "idStato" => "required|integer",
            "idNazione" => "required|integer",
            "nome" => "string|max:45",
            "cognome" => "required|string|max:45",
            "sesso" => "integer",
            "partitaIva" => "string|max:45",
            "codiceFiscale" => "required|string|max:16",
            "cittaNascita" => "string|max:45",
            "provinciaNascita" => "string|max:45",
            "dataNascita" => "required|date",
            "cittadinanza" => "string|max:45",
        ];
    }
}

