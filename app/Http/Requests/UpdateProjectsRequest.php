<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
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
            'category_id' => 'required',
            'link' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Project name',
            'description' => 'Project description',
            'category_id' => 'Project category',
            'link' => 'Project link',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
        ];
    }
}
