<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVocuchersRequest extends FormRequest
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
            'role_id'=>'required|in:1,2',
            'name'=>'required|min:3|max:50',
            'code'=>'required|unique:vouchers,code',
            'voucher_type'=>'required|in:P,F',
            'voucher_price'=>'required',
            'valid_till'=>'required|date',
            'status'=>'nullable|in:E'
        ];
    }
}
