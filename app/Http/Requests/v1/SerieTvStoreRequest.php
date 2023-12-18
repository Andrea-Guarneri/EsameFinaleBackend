<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class SerieTvStoreRequest extends FormRequest
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
            "titolo" => "required|string|max:255",
            "descrizione" => "required|string",
            "totaleStagioni" => "required|integer",
            "numeroEpisodio" => "required|integer",
            "regista" => "required|string|max:45",
            "attori" => "required|string|max:255",
            "annoInizio" => "required|integer",
            "annoFine" => "integer",
            "idImmagine" => "integer",
            "idFilmato" => "integer"
        ];
    }
}
