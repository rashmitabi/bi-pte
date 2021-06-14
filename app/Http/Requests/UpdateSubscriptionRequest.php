<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required|max:100',
            'role_id'=>'required|in:1,2',
            'students_allowed'=>'required|numeric',
            'monthly_price'=>'required|numeric',
            'quarterly_price'=>'required|numeric',
            'halfyearly_price'=>'required|numeric',
            'annually_price'=>'required|numeric',
            'white_labelling_price'=>'required|numeric',
            'mock_tests'=>'required|numeric',
            'practice_tests'=>'required|numeric',
            'videos'=>'nullable|in:Y,N',
            'prediction_files'=>'nullable|in:Y,N',
            'status'=>'nullable|in:E,D'
        ];
    }
}
