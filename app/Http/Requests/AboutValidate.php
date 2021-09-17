<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutValidate extends FormRequest
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
            'page_name' => 'required',
            'status' => 'string|required',
            'body' => 'required',
            'description' => 'nullable',
            'banner' => 'mimes:jpeg,jpg,bmp,png',
            'image_caption' => 'nullable',
        ];
    }
}
