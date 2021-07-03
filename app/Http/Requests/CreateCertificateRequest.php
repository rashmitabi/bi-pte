<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCertificateRequest extends FormRequest
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
            'student_user_id'=>'required|numeric',
            'test_id'=>'required|numeric',
            'score'=>'required|numeric|max:90',
            'speaking'=>'required|numeric|max:90',
            'listening'=>'required|numeric|max:90',
            'reading'=>'required|numeric|max:90',
            'writing'=>'required|numeric|max:90',
            'grammar'=>'required|numeric|max:90',
            'pronunciation'=>'required|numeric|max:90',
            'vocabulary'=>'required|numeric|max:90',
            'oral_fluency'=>'required|numeric|max:90',
            'spelling'=>'required|numeric|max:90',
            'written_discourse'=>'required|numeric|max:90'
        ];
    }
}
