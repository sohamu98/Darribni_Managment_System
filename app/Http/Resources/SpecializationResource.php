<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[

            
        'id'=>$this->id,
        'name'=>$this->name,
        'trainees'=>TraineeResource::collection($this->whenLoaded('trainees')),
        'employees'=>EmployeesResource::collection($this->whenLoaded('employees')),
        'coaches'=>CoachesResource::collection($this->whenLoaded('coaches')),
    

];
    }
}
