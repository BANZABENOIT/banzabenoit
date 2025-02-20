<?php

namespace App\Models;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class enrollment extends Model
{
    //
    protected $table="enrollments";
    protected $fillable=[
        'student_id',
        'course_name',
        'motivation',
        'status',
    ];
    use HasFactory;
    public function student():BelongsTo {
        return $this->belongsTo(student::class);
    }

}
