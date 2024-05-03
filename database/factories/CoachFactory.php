<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $spicializationIds = DB::table('specializations')->pluck('id')->all();
        return [
            'first_name'=>fake()->name(),
            'middle_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'email'=>fake()->email(),
            'birth_date'=>fake()->date(),
            'image'=>'images/YEvg1gIMAmC4AZ9OZcjXNwkoff2vY9hyE6R22sS4.jpg',
            'notes'=>fake()->text(),
           'salary_sp'=>fake()->randomDigit(),
           'salary_us'=>fake()->randomDigit(),
           'specialization_id' =>$spicializationIds[array_rand($spicializationIds)],
           'CoachID'=>'sp00',
        ];
    }
}
