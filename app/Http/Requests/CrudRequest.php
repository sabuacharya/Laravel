<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // dd($this->crud);
        return $this->crud;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if(request()->routeIs('crud.store')){
            $rule = 'required';
        }else {
            $rule = 'nullable';
        }
        return [
            
            'company'   =>  'required | string | min:3',
            'model'   =>  $rule . ' | string | min:3',
        ];
    }
}
