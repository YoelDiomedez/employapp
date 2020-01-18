<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'dni'              => ['required', 'numeric', 'digits:8', 'unique:users,dni,' . $this->user->id],
            'name'             => ['required', 'string', 'max:255'],
            'paternal_surname' => ['required', 'string', 'max:255'],
            'maternal_surname' => ['required', 'string', 'max:255'],
            'birth_date'       => ['required', 'date', 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('d-m-Y')],
            'gender'           => ['required', 'in:F,M'],
            'email'            => ['string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
        ];
    }
}
