<?php

namespace App\Models;

use App\Models\admin;
use App\Models\message;
use App\Models\student;
use App\Models\teacher;
use App\Models\candidature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class member extends Model
{
    //
    protected $table="members";
    protected $fillable=[
        'name',
        'email',
        'téléphone',
        'motivation',
        'role',
        'online',
        'last_seen',
    ];
    protected $casts=[
        
        'last_seen'=> 'datetime',
    ];
    use HasFactory;

    public function admins():HasOne{
        return $this->hasOne(admin::class,'member_id','id');
    }
    public function teachers():HasOne{
        return $this->hasOne(teacher::class,'member_id','id');
    }
    public function students():HasOne{
        return $this->hasOne(student::class,'member_id','id');
    }
    public function candidatures():HasOne{
        return $this->hasOne(candidature::class,'member_id','id');
    }
    public function sender():HasMany{
        return $this->hasMany(message::class,'sender_id','id');
    }
    public function receiver():HasMany{
        return $this->hasMany(message::class,'receiver_id','id');
    }
}
