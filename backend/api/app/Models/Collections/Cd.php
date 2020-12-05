<?php

namespace App\Models\Collections;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    protected $fillable = [
        'name',
        'loaned',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
