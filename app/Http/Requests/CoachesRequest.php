<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoachesRequest extends FormRequest
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
            'first_name'=>'required|string|max:255',
            'middle_name'=>['string','max:255'],
            'last_name'=>['string','max:255'],
            'phone'=>['numeric'],
            'address'=>['string','max:255'],
            'email'=>['email','unique:coaches'],
            'birth_date'=>['date'],
            'image'=>['string','max:255'],
            'notes'=>['string','max:255'],
           'salary_sp'=>['numeric'],
           'salary_us'=>['numeric'],
           'CoachID'=>['string'],
           'specialization_id'=>['sometimes','nullable','exists:specializations,id'],
        ];
    }
}
