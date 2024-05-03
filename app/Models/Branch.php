<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prefix'
    ];


    public function trainingBatche(): HasMany
    {

        return $this->hasMany(TrainingBatch::class,'branch_id');


    }

    public function employee(): HasMany
    {

        return $this->hasMany(Employees::class,'branch_id');
    }


}
