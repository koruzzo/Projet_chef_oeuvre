<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $imageRule = [
            'required',
            'image',
            'max:2048', 
            'mimes:jpeg,png,jpg,gif',
        ];
    
        return [
            'title' => ['required', 'string', 'max:25'],
            'content' => ['required', 'string', 'max:10000'],
            'picture' => $imageRule,
        ];
    }
}


