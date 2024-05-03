<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specializationIds = DB::table('specializations')->pluck('id')->all();
        $branchIds = DB::table('branches')->pluck('id')->all();
        return [
            'darrebni_id'=>fake()->numberBetween(1,10),
            'first_name'=>fake()->name(),
            'middle_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'birth_date'=>fake()->date(),
            'email'=>fake()->email(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'image'=>'images/YEvg1gIMAmC4AZ9OZcjXNwkoff2vY9hyE6R22sS4.jpg',
            'salary'=>fake()->randomDigit(),
            'note'=>fake()->text(),
            'specialization_id'=>$specializationIds[array_rand($specializationIds)],
            'branch_id'=>$branchIds[array_rand($branchIds)],
        ];
    }
}
