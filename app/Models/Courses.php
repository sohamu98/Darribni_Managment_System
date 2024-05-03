<?php

namespace App\Models;

use App\Models\TrainingBatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prefix',
    ];



    public function trainingBatche(): HasMany
    {

        return $this->hasMany(TrainingBatch::class,'course_id');
    }
}


