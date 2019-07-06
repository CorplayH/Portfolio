<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class PortfolioRequest extends FormRequest
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
            'name' => 'required',
//            'newCategory' => 'alpha_dash|nullable',
            'type' => 'required',
//            'thumbUrl' => 'required_without:fileUrl',
//            'fileUrl' => 'required_without:websiteUrl',
//            'websiteUrl' => 'required_without:fileUrl',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'You must enter a project name',
            'newCategory.alpha_dash' => 'Category/Tag name can not contain space, please use "_" instead',
            'type.required' => 'You must choose you project type',
            'fileUrl.required' => 'You must upload you portfolio file',
        ];
    }
}
