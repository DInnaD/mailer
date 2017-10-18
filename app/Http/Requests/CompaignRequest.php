<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaignRequest extends FormRequest
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
            'name_compaign' => 'required|min:5|max:200',
            
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
            'name_compaigns' => 'The :attribute value is required :input is not between 1:min - 200:max.',
            
        ];
    }    
}
