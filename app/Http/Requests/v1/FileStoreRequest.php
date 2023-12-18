<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
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
            "idRecord" => "required|integer",
            "tabella" => "required|string|max:45",
            "nome" => "required|string|max:45",
            "size" => "required|integer",
            "ext" => "required|string|max:6",
            "descrizione" => "required|string",
            "formato" => "required|string|max:45"
        ];
    }
}
