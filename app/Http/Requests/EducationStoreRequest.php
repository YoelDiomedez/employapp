<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
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
            'degree_id'     => ['required', 'numeric'],
            'country_id'    => ['required', 'numeric'],
            'specialty'     => ['required', 'string', 'max:60'],
            'degree_date'   => ['nullable', 'date', 'before:tomorrow'],
            'college'       => ['required', 'string', 'max:255'],
            'city'          => ['required', 'string', 'max:255'],
            'degree_file'   => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'degree_status' => ['nullable', 'in:E,T,C'],
            'description'   => ['nullable', 'string', 'max:255'],
        ];
    }
}
