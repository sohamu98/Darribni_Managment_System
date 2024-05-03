<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TraineePayment>
 */
class TraineePaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $traineeIds = DB::table('trainees')->pluck('id')->all();
       $trainingBatchesIds = DB::table('training_batches')->pluck('id')->all();

       return [
        'trainee_id' => $traineeIds[array_rand($traineeIds)],
        'training_batch_id'=>$trainingBatchesIds[array_rand($trainingBatchesIds)],
        'trainee_Payment'=>fake()->randomDigit(),
       ];
    }
}
