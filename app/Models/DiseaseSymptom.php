<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiseaseSymptom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mb',
        'md',
        'symptoms_id',
        'diseases_id',
    ];

    public function symptom() {
        return $this->hasOne(Symptom::class, 'id', 'symptoms_id');
    }
}
