<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'first_name'=>$this->first_name,
            'middle_name'=>$this->middle_name,
            'last_name'=>$this->last_name,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'email'=>$this->email,
            'birth_date'=>$this->birth_date,
            'image'=>$this->image,
            'notes'=>$this->notes,
           'salary_sp'=>$this->salary_sp,
           'salary_us'=>$this->salary_us,
           'specialization_id'=>$this->specialization_id,
           'trainingBatches'=>TrainingBatchResource::collection($this->whenLoaded('trainingBatches')),

        
        ];

        
    }
}
