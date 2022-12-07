<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'course' => 'nullable',
            'institute' => 'nullable',
            'grade' => 'nullable',
            'total_grade' => 'nullable',
            'description' => 'nullable',
        ];
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'course' => 'Course',
            'institute' => 'Institute',
            'grade' => 'Grade',
            'total_grade' => 'Total Grade',
            'description' => 'Description',
        ];
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
        ];
    }
}
