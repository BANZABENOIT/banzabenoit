<?php

namespace App\Models;

use App\Models\admin;
use App\Models\member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class message extends Model
{
    //
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'content',];
    protected $casts=[
        
        'read_at'=> 'datetime',
    ];

    public function senders()
    {
        return $this->belongsTo(member::class, 'sender_id');
    }

    public function receivers()
    {
        return $this->belongsTo(member::class, 'receiver_id');
    }
    public function sender()
    {
        return $this->belongsTo(admin::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(admin::class, 'receiver_id');
    }

}
