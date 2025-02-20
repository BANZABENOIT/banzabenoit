<?php

namespace App\Models;

use App\Models\member;
use App\Models\domaine;
use App\Models\message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    //
    use Notifiable;
    protected $table="admins";
    protected $fillable=[
        'member_id',
        'name',
        'email',
        'matricule',
        'phone_number',
        'photo_de_profil',
        'online',
        'last_seen',
    ];
     use HasFactory;
    public function domaines():HasMany{
        return $this->hasMany(domaine::class,'admin_id','id');
    }
    public function members():BelongsTo{
        return $this->belongsTo(member::class,'member_id','id');
    }
    public function sender():HasMany{
        return $this->hasMany(message::class,'sender_id','id');
    }
    public function receiver():HasMany{
        return $this->hasMany(message::class,'receiver_id','id');
    }
}
