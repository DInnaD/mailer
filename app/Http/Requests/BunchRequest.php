<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BunchRequest extends FormRequest
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
            'name_bunch' => 'required|min:1|max:32',
            'description_bunch' => 'max:128',
        ];
    }
    /*
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        //////////////////////////////??????????????????????????????????????????????????????? 
            'name_bunch' => 'The :attribute value is required :input is not between 1:min - 32:max.',
            'description_bunch'  => 'The :attribute value :input is more then 128:max.',
        ];
    }
}
