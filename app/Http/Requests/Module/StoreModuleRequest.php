<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
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
            'name' => ['required','string','max:32','unique:modules,name'],
            'description' => ['nullable'],
            'nb_downloads' => ['nullable'],
            'nb_active_installations' => ['nullable'],
            'tags' => ['nullable'],
            'price' => ['nullable'],
            'platform' => ['nullable'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
            'video' => ['nullable', 'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv', 'max:9000000']
        ];
    }
}
