<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreblogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:3|max:90|string',
            'slug'=>'required|min:1|max:100|string|unique:blogs',
            'description'=>'required|min:10|max:90|string',
            'short_description'=>'required|min:10|max:350|string',
            'content'=>'required|min:1|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
