<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [

        'darrebni_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'email',
        'phone',
        'address',
        'image',
        'salary',
        'note',
        'specialization_id',
        'branch_id',

    ];

    public function specialization(): BelongsTo
    {

        return $this->belongsTo(Specialization::class,'specialization_id');

    }

    public function brunsh(): BelongsTo
    {

        return $this->belongsTo(Branch::class,'branch_id');

    }



}
