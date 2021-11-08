<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'filepath' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'title.min' => 'Slug precisa ter no mínimo 3 caracters',
        ];
    }
}
