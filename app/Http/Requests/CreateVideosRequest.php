<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVideosRequest extends FormRequest
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
            'description'=>'max:1000',
            'link'=>'required|url|max:250',
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
            'section_id.required' => 'Please select the video section',
            'design_id.required' => 'Please select the video type',
            'title.required' => 'Please enter the video title',
            'link.required' => 'Please enter the video link'
        ];
    }
}
