<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'enroll_id',
        'type',
        'obtained',
        'total',
        'mark_by'
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enroll_id');
    }

    public function course()
    {
        return $this->hasOneThrough(Course::class, Enrollment::class, 'id', 'id', 'enroll_id', 'course_id');
    }
}
