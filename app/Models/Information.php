<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salary',
        'countHours',
        'hourlySalary',
        'percent',
        'kassa',
        'tips',
        'taxi',
        'rub',
        'other',
        'dateInfo',
    ];
}
