<?php

namespace App\Http\Requests\Version;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVersionRequest extends FormRequest
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
            'version_name' => ['required','string','max:64','unique:versions,name'],
            'location' => ['nullable'],
            'git_link' => ['nullable'],
            'demo_link' => ['nullable'],
            'demo_bo_link' => ['nullable'],
            'documentation_link' => ['nullable'],
            'nb_downloads' => ['nullable'],
            'nb_active_installations' => ['nullable'],
            'changelog' => ['nullable'],
            'metadatas' => ['nullable'],
        ];
    }
}
