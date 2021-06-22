<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:50',
            'body' => 'required',
        ];
    }

    public function messages() 
    {
        return [
        'title.required' => 'This post needs a title.',
        'title.max'      => 'The title has to be less than 50 characters long.',
        'body.required'  => 'This post needs a body.',
        'image.mimes'    => 'The file has to be a jpeg,jpg,png,or gif file.',
        'image.max'      => 'The file size has to be less than 10MB.',
        ];
    }
}
