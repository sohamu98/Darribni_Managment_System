<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingBatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'TrainingBatchID',
        'price',
        'currency',
        'days',
        'coach_id',
        'course_id',
        'branch_id',
    ];


    public function coache(): BelongsTo
    {

        return $this->belongsTo(Coach::class,'coach_id');
    }

    
    public function course(): BelongsTo
    {

        return $this->belongsTo(Courses::class,'course_id');
    }

    
    public function branch(): BelongsTo
    {

        return $this->belongsTo(Branch::class,'branch_id');
    }

    
    public function trainee_Payment(): HasMany
    {

        return $this->hasMany(TraineePayment::class,'training_batch_id');
    }
}
