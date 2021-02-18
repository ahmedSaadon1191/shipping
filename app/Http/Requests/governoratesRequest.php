<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class governoratesRequest extends FormRequest
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
            
            'name'      => ['required', Rule::unique('governorates')->ignore($this->id)->whereNull('deleted_at')],
        ];
    }

    public function messages()
    {
        return
        [
            
            'name.required'     => 'يجب ادخال اسم المحافظة',
            'name.unique'       => 'هذا الاسم مستخدم من قبل',
        ];
    }
}
