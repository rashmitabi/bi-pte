<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePredictionRequest extends FormRequest
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
            'title'=>'required|max:250',
            'description'=>'required|max:1000',
            'file'=>'required|max:10000|mimes:doc,docx,pdf',
            'section_id'=>'required|numeric',
            'design_id'=>'required|numeric',
            'status'=>'nullable|in:E,D'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'section_id.required' => 'Please select file section',
            'design_id.required' => 'Please select file type',
            'title.required' => 'Please enter file title',
            'description.required' => 'Please enter file description',
            'file.required' => 'Please upload the prediction file'
        ];
    }
}
