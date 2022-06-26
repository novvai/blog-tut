<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'name' => 'required|min:3|unique:tags',
            'descr' => 'required|min:5|max:254'
        ];
    }

    public function messages()
    {
        return [
            'descr.required' =>  "The Description field is required",
            'descr.min' => "The Description field must be at least :min",
            'descr.max' => "The Description field must be less than :max",
        ];
    }
}
