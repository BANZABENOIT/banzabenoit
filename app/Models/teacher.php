<?php

namespace App\Models;

use App\Models\cours;
use App\Models\member;
use App\Models\domaine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class teacher extends Authenticatable
{
    //
    use Notifiable;
    protected $table="teachers";
    protected $fillable=[
        'member_id',
        'name',
        'email',
        'matricule',
        'phone_number',
        'photo_de_profil',
        'domaine_id',
    ];
    use HasFactory;

    public function cours():HasMany{
        return $this->hasMany(cours::class,'teacher_id','id');
    }
    public function member():BelongsTo{
        return $this->belongsTo(member::class, 'member_id', 'id');
    }
    public function domaine():BelongsTo{
        return $this->belongsTo(domaine::class,'domaine_id','id');
    }
}
