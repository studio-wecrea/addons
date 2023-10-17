<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required','string','max:64'],
            'lastname' => ['required','string','max:64'],
            'email' => ['required','string','max:64','unique:customers,email'],
            'phone' => ['nullable'],
            'role' => ['required'],
            'image' => ['nullable'],
        ];
    }
}
