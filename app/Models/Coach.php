<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coach extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'address',
        'email',
        'birth_date',
        'image',
        'notes',
       'salary_sp',
       'salary_us',
       'specialization_id',
       'CoachID',
    ];

    public function trainingBatche(): HasMany
    {

        return $this->hasMany(TrainingBatch::class, 'coach_id');

    }

    public function specialization(): BelongsTo
    {

        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
}
