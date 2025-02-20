<?php

namespace App\Models;

use App\Models\quiz;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class resultat extends Model
{
    //
    protected $table="résultats";
    protected $fillable=[
        'student_id',
        'quiz_id',
        'score',
        'status',
        'total_questions',
        'correct_answers',
    ];
    use HasFactory;

    public function student():BelongsTo{
        return $this->belongsTo(student::class,'student_id','id');
    }
    public function quiz():BelongsTo{
        return $this->belongsTo(quiz::class,'quiz_id','id');
    }
}
