<?php

namespace Database\Seeders;

use App\Models\TraineePayment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TraineePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TraineePayment::factory(10)->create();
    }
}
