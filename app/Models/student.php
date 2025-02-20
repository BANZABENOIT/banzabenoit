<?php

namespace App\Models;

use App\Models\cours;
use App\Models\domaine;
use App\Models\resultat;
use App\Models\enrollment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class student extends Authenticatable
{
    //
    use Notifiable;
    protected $table="students";
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
    public function enrollments():HasMany{
        return $this->hasMany(enrollment::class,'student_id','id');
    }
    public function resultat():HasMany{
        return $this->hasMany(resultat::class,'student_id','id');
    }
    public function cours():BelongsToMany{
        return $this->belongsToMany(cours::class, 'enrollments');
    }
    public function domaine():BelongsTo{
        return $this->belongsTo(domaine::class,'domaine_id','id');
    }

    public static function generateMatricule() {
        return 'STU-100' . strtoupper(Str::random(6));
    }
    

}
