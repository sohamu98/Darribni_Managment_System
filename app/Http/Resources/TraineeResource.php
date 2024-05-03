<?php

namespace App\Http\Resources;

use App\Models\TraineePayment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TraineeResource extends JsonResource
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
            'first_name_ar' => $this->first_name_ar,
            'middle_name_ar' => $this->middle_name_ar,
            'last_name_ar' => $this->last_name_ar,
            'first_name_en' => $this->first_name_en,
            'middle_name_en' => $this->middle_name_en,
            'last_name_en' => $this->last_name_en,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'date' => $this->date,
            'trainee_Payments'=>TraineePaymentReosource::collection($this->whenLoaded('trainee_Payments')),
            'specializations' => SpecializationResource::make($this->whenLoaded('specializations')),


        ];
    }
}
