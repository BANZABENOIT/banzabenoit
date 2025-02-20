<?php

namespace App\Models;

use App\Models\admin;
use App\Models\cours;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class domaine extends Model
{
    //
    protected $table="domaines";
    protected $fillable=[
        'name',
        'description',
        'admin_id',
    ];
    use HasFactory;
    public function cours():HasMany{
        return $this->hasMany(cours::class,'domaine_id','id');
    }
    public function admin():BelongsTo{
        return $this->belongsTo(admin::class,'admin_id','id');
    }
    public function student():HasMany{
        return $this->HasMany(student::class,'domaine_id','id');
    }
    public function teacher():HasMany{
        return $this->hasMany(teacher::class,'domaine_id','id');
    }
}
