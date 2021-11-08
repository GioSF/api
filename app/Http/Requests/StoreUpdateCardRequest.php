<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'nullable|min:3|max:255',
            'date_issue' => 'nullable|min:3|max:255',
            'duration_issue' => 'nullable|min:3|max:255',
            'abstract' => 'nullable|min:3|max:255',
            'comment' => 'nullable|min:3|max:10000',
            'issue' => 'nullable|min:3|max:255',
            'organization_id' => 'nullable|min:1|max:255'
        ];
    }
    public function messages()
    {
        return[
            'subject.min' => 'Subject precisa ter no mínimo 3 caracters',
        ];
    }
}
