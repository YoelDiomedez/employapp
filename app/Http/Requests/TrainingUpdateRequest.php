<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingUpdateRequest extends FormRequest
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
            'country_id'  => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:60'],
            'start_date'  => ['required', 'date'],
            'end_date'    => ['required', 'date', 'after:start_date'],
            'institution' => ['required', 'string', 'max:255'],
            'city'        => ['required', 'string', 'max:255'],
            'hours'       => ['required', 'numeric', 'min:0'],
            'file'        => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }
}
