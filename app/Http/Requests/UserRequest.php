<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name"=>"requried|string|",
            "email"=>"required|email|unique",

        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Istifadeci sahəsi boş buraxıla bilməz!",
            "name.string" => "Istifadeci sahəsi mətn olmalıdır!",
            "email.required" => "Email  sahəsi boş buraxıla bilməz!",
            "email.email" => "Email sahəsi email formatinda olmalıdır!",
            "email.unique" => "Email sahəsi artıq istifadə olunub!",

        ];
    }
}
