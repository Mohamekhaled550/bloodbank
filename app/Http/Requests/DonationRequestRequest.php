<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class DonationRequestRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'patient_name' => 'required|string',
            'patient_age' => 'required|integer',
            'bloodtype_id' => 'required|exists:bloodtypes,id',
            'bags_num' => 'required|integer',
            'hospital_name' => 'required|string',
            'hospital_address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }


  // ✅ هنا نعمل Override لدالة الفاليديشن عشان نرجع رسالة JSON
  protected function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(responsejson(0, 'Validation Error', $validator->errors()));
  }
}
