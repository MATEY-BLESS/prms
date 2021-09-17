<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleValidate extends FormRequest
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
            'title' => 'required',
            'status' => 'string|required',
            'tags' => 'nullable',
            'body' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'source' => 'required',
            'second_source' => 'nullable',
            'post_image' => 'mimes:jpeg,jpg,bmp,png',
            'image_caption' => 'nullable',
        ];
    }
}
