<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingBatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'TrainingBatchID' => $this->TrainingBatchID,
            'price' => $this->price,
            'currency' => $this->currency,
            'days' => json_decode($this->days),
            'courses' => CourseResource::make($this->whenLoaded('courses')),
            'branches' => BranchResource::make($this->whenLoaded('branches')),
            'coaches' => CoachesResource::make($this->whenLoaded('coaches')),
            'trainee_Payments'=>TraineePaymentReosource::collection($this->whenLoaded('trainee_Payments')),
        ];
    }
}
