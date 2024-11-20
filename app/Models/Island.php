<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $fillable = ['name'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
