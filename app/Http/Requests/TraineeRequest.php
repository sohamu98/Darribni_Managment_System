<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraineePaymentRequest extends FormRequest
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
            'training_batch_id'=>['sometimes','nullable','exists:training_batch_id'],
            'trainee_Payment'=>['required','numeric'],
            'trainee_id'=>['sometimes','nullable','exists:trainee_id'],
        ];
    }
}
