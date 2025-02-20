<?php

namespace App\Models;

use App\Models\lesson;
use App\Models\question;
use App\Models\resultat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class quiz extends Model
{
    //
    protected $table="quizzes";
    protected $fillable=[
        'lesson_id',
        'titre',
        'description',
    ];
    use HasFactory;
    public function lesson():BelongsTo{
        return $this->belongsTo(lesson::class,'lesson_id','id');
    }
    public function question():HasMany{
        return $this->hasMany(question::class,'quiz_id','id');
    }
    public function resultat():HasMany{
        return $this->hasMany(resultat::class,'quiz_id','id');
    }

}
