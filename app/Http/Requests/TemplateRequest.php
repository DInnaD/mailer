<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
            'name_template' => 'required|min:5|max:32',
            'content_template' => 'required|min:5|max:512',
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
            'name_template' => 'The :attribute value is required :input is not between 5:min - 32:max.',
            'description_template'  => 'The :attribute value is required :input is not between 5:min - 512:max.',
        ];
    }    
}
