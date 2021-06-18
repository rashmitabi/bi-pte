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
        $voucher_type = $this->request->get('voucher_type');
        $rules = [
            'role_id'=>'required|numeric',
            'name'=>'required|min:3|max:50',
            'code'=>'required|unique:vouchers,code',
            'voucher_type'=>'required|in:P,F',
            'valid_till'=>'required|date',
            'status'=>'nullable|in:E'
        ];
        if ($voucher_type == 'P') {
            $rules['voucher_price'] = 'required|numeric|between:1,100';
        }else{
            $rules['voucher_price'] = 'required|numeric';
        }
        return $rules;
    }
    // public function messages()
    // {
    //     return [
    //         'title.required' => 'A title is required',
    //         'body.required' => 'A message is required',
    //     ];
    // }
}
