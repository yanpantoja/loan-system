<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
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
