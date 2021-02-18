<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class citiesRequest extends FormRequest
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
        return 
        [
            'name'              => ['required', Rule::unique('cities')->ignore($this->id)->whereNull('deleted_at')],
            'governorate_id'    => 'required',
        ];
    }

    public function messages()
    {
        return
        [
            
            'name.required'     => 'يجب ادخال اسم المدينة',  
            'name.unique'      => 'هذا الاسم مستخدم من قبل',
            'governorate_id.required'    => ' اسم المحافظة مطلوب ',
           
           
           
        ];
    }
}
