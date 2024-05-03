<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        
    ];

    public function trainee() : HasMany
    {

        return $this->hasMany(Trainee::class,'specialization_id');
    }

    
    public function employee() : HasMany
    {

        return $this->hasMany(Employees::class,'specialization_id');
    }

    
    public function coach() : HasMany
    {

        return $this->hasMany(Coach::class,'specialization_id');
    }
}
