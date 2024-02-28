<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'advisor_name',
        'advisor_phone',
        'conduct',
        'class_activity',
        'attendance',
        'total_percent',
        'total_result',
        'subject_result',
        'subject_id',
        'percent',
        'total_result',
        'total_percent',
    ];




    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
