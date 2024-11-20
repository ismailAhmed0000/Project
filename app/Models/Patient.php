<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'dob', 'national_id', 'address_id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
