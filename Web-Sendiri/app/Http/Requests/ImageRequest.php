<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $rule_activity_unique = Rule::unique('galeries','name');
        if ($this->method() !== 'POST') {
            $rule_activity_unique->ignore($this->route()->parameter('id'));
        };
        return [
            'name'=> ['required', $rule_activity_unique],
            'description'=> ['required'],
        ];
    }
    public function messages()
    {
        return[
        'required' => '!!! This field is required to be fill !!!'
        ];
    }
}
