<?php

namespace App\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'firstname' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'email' => ['required','string','max:255','unique:customers,email,' . $this->route('id')],
            // 'email' => ['required','string','max:255',Rule::unique('customers','email')->ignore($this->route('id'))],
            'phone' => ['nullable'],
            'image' => ['nullable'],
        ];
    }
}
