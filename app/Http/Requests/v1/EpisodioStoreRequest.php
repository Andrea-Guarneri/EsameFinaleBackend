<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodioStoreRequest extends FormRequest
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
            "idSerie" => "required|integer",
            "titolo" => "required|string|max:255",
            "descrizione" => "required|string",
            "numeroStagione" => "required|integer",
            "numeroEpisodio" => "required|integer",
            "durata" => "required|integer",
            "anno" => "integer | max:" . date("Y"),
            "idImmagine" => "integer",
            "idFilmato" => "integer"
        ];
    }
}
