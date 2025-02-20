<?php

namespace App\Models;

use App\Models\lesson;
use App\Models\domaine;
use App\Models\student;
use App\Models\teacher;
use App\Models\enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class cours extends Model
{
    //
    protected $table="cours";
    protected $fillable=[
        'titre',
        'description',
        'domaine_id',
        'teacher_id',
        'prix'
    ];
        use HasFactory;
    public function domaine():BelongsTo{
        return $this->belongsTo(domaine::class,'domaine_id','id');
    }
    public function teacher():BelongsTo{
        return $this->belongsTo(teacher::class,'teacher_id','id');
    }
    public function lesson():HasMany{
        return $this->hasMany(lesson::class,'cour_id','id');
    }
    public function enrollments():HasMany{
        return $this->hasMany(enrollment::class,'course_name','titre');
    }
    public function student():BelongsToMany{
        return $this->belongsToMany(student::class,'enrollments');
    }
    
}
