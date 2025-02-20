<?php

namespace App\Models;

use App\Models\quiz;
use App\Models\student;
use App\Models\question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class answer extends Model
{
    //
    protected $table="answers";
    protected $fillable=[
        'student_id',
        'quiz_id',
        'question_id',
        'is_correct',
        'selected_option',
    ];

    use HasFactory;

    public function question():BelongsTo{
        return $this->belongsTo(question::class,'question_id','id');
    }
    public function quiz():BelongsTo{
        return $this->belongsTo(quiz::class,'quiz_id','id');
    }
    public function student():BelongsTo{
        return $this->belongsTo(student::class,'student_id','id');
    }
}
