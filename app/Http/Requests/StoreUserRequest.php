<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'type'=>'required',
            'fname' => 'required',
            'lname' => 'required',
            'uname'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
            'semail'=>'required',
            'dob' =>'required',
            'mobileno' =>'required',
            'sstatus'=>'required|in:P,A,R',
            'gender'=>'required|in:M,F',
            'scitizen'=>'required',
            'sresidence'=>'required',
            'svalidity'=>'required',
            'simage'=>'nullable'
        ];
    }
}
