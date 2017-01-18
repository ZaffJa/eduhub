<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class NewInstitutionRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'established' => 'required',
            'location' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'file' => 'required|image',

        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'You must upload your institution logo',
        ];
    }
}
