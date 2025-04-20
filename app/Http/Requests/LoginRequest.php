<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'phone'=> 'required',
            'password'=> 'required',
            'device_token' => 'nullable|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(responsejson(1, 'un true information', $validator->errors()));
    }
};
