<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            'darrebni_id'=>['required','string','max:255'],
            'first_name'=>['required','string','max:255'],
            'middle_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'phone'=>['required','numeric'],
            'address'=>['required','string','max:255'],
            'email'=>['required','email','unique:coaches'],
            'birth_date'=>['required','date'],
            'image'=>['required','string','max:255'],
            'note'=>['required','string','max:255'],
            'salary'=>['required','numeric'],
            'branch_id'=>['sometimes','exists:branches,id'],
            'specialization_id'=>['sometimes','exists:specializations,id'],
        ];
    }
}
