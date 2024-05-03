<?php

namespace App\Http\Resources;

use App\Models\TrainingBatch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TraineePaymentReosource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'trainee_Payment' => $this->trainee_Payment,
            // 'trainees'=>TraineeResource::make($this->whenLoaded('trainees')),
            // 'trainingBatches'=>TrainingBatchResource::make($this->whenLoaded('trainingBatches')),
            'trainee_id'=>$this->trainee_id,
            'training_batch_id'=>$this->training_batch_id,
           

        ];
    }
}
