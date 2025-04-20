<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'name'=>'required',
            'city_id'=> 'required',
            'phone'=> 'required|unique:users',
            'email'=> 'required|unique:users',
            'd_l_d'=>'required',
            'birth_date'=>'required',
            'password'=> 'required|confirmed',
            'bloodtype_id' => 'required|exists:bloodtypes,id', // ✅ نتحقق من وجود الـ id في جدول bloodtypes

        ];
    }


  // ✅ هنا نعمل Override لدالة الفاليديشن عشان نرجع رسالة JSON
  protected function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(responsejson(0, 'Validation Error', $validator->errors()));
  }
}
