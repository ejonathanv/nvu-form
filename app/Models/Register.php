<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    public function zoomDate()
    {
        return $this->belongsTo(ZoomDate::class);
    }
}
