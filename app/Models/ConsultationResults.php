<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultants_id',
        'possibility'
    ];
}
