<?php

namespace App\Models;


use App\Models\TrainingBatch;
use App\Models\Trainee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TraineePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'trainee_Payments',
        'trainee_id',
        'training_batch_id',
       
    ];

    public function trainingBatche(): BelongsTo
    {

        return $this->belongsTo(TrainingBatch::class,'training_batch_id');
    }

    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class, 'trainee_id');
    }
}
