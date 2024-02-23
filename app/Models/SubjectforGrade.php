<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectforGrade extends Model
{
    use HasFactory;
      
    protected $fillable = [
        'subject_id',
        'grade_id',
        'field_of_study',
    ];


        public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    
}
