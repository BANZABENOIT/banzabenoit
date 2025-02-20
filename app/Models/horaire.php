<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horaire extends Model
{
    //
    protected $table="horaires";
    protected $fillable=[
        'jours',
        'heure',
        'cours',
        'enseignant',
    ];
}
