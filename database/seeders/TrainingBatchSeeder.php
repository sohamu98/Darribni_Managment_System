<?php

namespace Database\Seeders;

use App\Models\TrainingBatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingBatch::factory(100)->create();
    }
}
