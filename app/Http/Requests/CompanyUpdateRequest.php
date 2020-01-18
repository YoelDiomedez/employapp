<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'business_name'         => ['required', 'string', 'max:255'],
            'ruc'                   => ['required', 'numeric', 'digits:11', 'unique:companies,ruc,' . $this->company_id],
            'address'               => ['required', 'string', 'max:255'],
            'phone_or_mobile'       => ['required', 'numeric', 'digits:9'],
            'dni'                   => ['required', 'numeric', 'digits:8', 'unique:users,dni,' . Auth::id()],
            'name'                  => ['required', 'string', 'max:255'],
            'paternal_surname'      => ['required', 'string', 'max:255'],
            'maternal_surname'      => ['required', 'string', 'max:255'],
            'birth_date'            => ['required', 'date', 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('d-m-Y')],
            'gender'                => ['required', 'in:F,M'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'current_password'      => ['nullable', 'string', 'min:6'],
            'password'              => ['nullable', 'string', 'min:6', 'confirmed', 'different:current_password'],
            'password_confirmation' => ['nullable', 'string', 'min:6'],
        ];
    }
}
