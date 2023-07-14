<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomDate extends Model
{
    use HasFactory;

    public function referral(){
        return $this->belongsTo(Referral::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function getTotalRegistersAttribute()
    {
        return $this->participants - $this->registers->count();
    }
}
