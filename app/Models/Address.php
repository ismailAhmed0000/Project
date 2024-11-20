<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'city', 'island_id'];

    public function island()
    {
        return $this->belongsTo(Island::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
