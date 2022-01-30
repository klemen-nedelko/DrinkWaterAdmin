<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterAmount extends Model
{
    
    protected $fillable = [
        'amount',
        'users_id',
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}
