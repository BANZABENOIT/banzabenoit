<?php

namespace App\Models;

use App\Models\quiz;
use App\Models\cours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lesson extends Model
{
    //
    protected $table="lessons";
    protected $fillable=[
        'cour_id',
        'titre',
        'description',
        'video_url',
        'pdf_url'
    ];
    use HasFactory;

    public function cours():BelongsTo{
        return $this->belongsTo(cours::class,'cour_id','id');
    }
    public function quiz():HasMany{
        return $this->hasMany(quiz::class,'lesson_id','id');
    }
}
