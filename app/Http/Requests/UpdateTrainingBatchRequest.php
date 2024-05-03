<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingBatchRequest extends FormRequest
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
            
                'name' => ['required', 'string'],
                'TrainingBatchID' => ['required', 'string', /*'unique:App\Models\TrainingBatch,TrainingBatchID,*/],
                'price' => ['required'],
                'currency' => ['required', 'string'],
                'days' => ['array'],
                'days.*' => ['required', 'integer', 'between:0,6'],
                'coach_id' => ['sometimes', 'nullable'],
                'course_id' => ['sometimes', 'nullable'],
                'branch_id' => ['sometimes', 'nullable'],
                
            
        ];
    }
}
