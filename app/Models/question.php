<?php

namespace App\Models;

use App\Models\quiz;
use App\Models\answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class question extends Model
{
    //
    protected $table="questions";
    protected $fillable=[
        'quiz_id',
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_correcte',
    ];
    use HasFactory;

    public function quiz():BelongsTo{
        return $this->belongsTo(quiz::class,'quiz_id','id');
    }
    public function answers():HasMany{
        return $this->hasMany(answer::class,'question_id','id');
    }
}
