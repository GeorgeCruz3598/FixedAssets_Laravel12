<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'codigo' => 'required|string',
			'descrip' => 'required|string',
			'precio' => 'required',
			'foto' => 'required|image|mimes:jpg,png,jpeg,webp|max:1024',
			'estados_id' => 'required',
			'grupos_id' => 'required',
			'oficinas_id' => 'required',
			'responsables_id' => 'required',
        ];
    }
}
