<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class notification extends Model
{
    //
    protected $table="notifications";
    protected $fillable=[
        'titre',
        'content',
        'target_group',
        'created_by',
    ];
    use HasFactory;
    public function admin():BelongsTo{
        return $this->belongsTo(admin::class, 'created_by');
    }
}
