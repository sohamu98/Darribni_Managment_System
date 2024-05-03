<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTraineeRequest extends FormRequest
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
            'first_name_ar' => 'required|string',
            'middle_name_ar' => 'required|string',
            'last_name_ar' => 'required|string',
            'first_name_en' => 'required|string',
            'middle_name_en' => 'required|string',
            'last_name_en' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'date' => 'required|date',
            'specialization_id'=>['sometimes','exists:specializations,id'],
        ];
    }
}
