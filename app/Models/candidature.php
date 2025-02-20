<?php

namespace App\Models;

use App\Models\member;
use App\Models\domaine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class candidature extends Model
{
    //
    protected $table="candidatures";
    protected $fillable=[
        'member_id',
        'name',
        'email',
        'phone_number',
        'domaine_id',
        'motivation',
        'status'
    ];
    use HasFactory;
    public function member():BelongsTo{
        return $this->belongsTo(member::class,'member_id','id');
    }
    public function domaine():BelongsTo{
        return $this->belongsTo(domaine::class,'domaine_id','id');
    }
}
