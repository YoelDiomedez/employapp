<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ApplicantUpdateRequest extends FormRequest
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
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'ruc'              => ['required', 'numeric', 'digits:11', 'unique:applicants,ruc,' . $this->applicant_id],
            'cellphone_number' => ['required', 'numeric', 'digits:9'],
            'marital_status'   => ['required', 'in:S,C,D,V'],
            'address'          => ['required', 'string', 'max:255'],
            'department_id'    => ['required', 'numeric'],
            'province_id'      => ['required', 'numeric'],
            'district_id'      => ['required', 'numeric'],
            'tuition_number'   => ['nullable', 'numeric', 'digits:5', 'unique:applicants,tuition_number,' . $this->applicant_id],
            'ffaa_file'        => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'disability_file'  => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }
}
