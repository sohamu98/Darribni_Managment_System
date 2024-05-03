<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingBatch>
 */
class TrainingBatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        $length = random_int(1,6);
        $array = [];

        while(count($array) < $length){

            $randomValue = random_int(0,6);

            if(!in_array($randomValue,$array)){

                $array[] = $randomValue;
            }

         }
        $coachIds = DB::table('coaches')->pluck('id')->all();
        $courseIds = DB::table('courses')->pluck('id')->all();
        $branch_id = DB::table('branches')->pluck('id')->all();

        
        return [
            'name'=>fake()->name(),
            'TrainingBatchID'=>'TP'. random_int(1,10),
            'price'=>random_int(1000,100000),
            'currency'=>'USD',
            'days'=>json_encode($array,true),
            'coach_id'=>$coachIds[array_rand($coachIds)],
            'course_id'=>$courseIds[array_rand($courseIds)],
            'branch_id'=>$branch_id[array_rand($branch_id)],
            
        ];
    }
    
}
