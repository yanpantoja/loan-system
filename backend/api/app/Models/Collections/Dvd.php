<?php

namespace App\Models\Collections;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    protected $fillable = [
        'name',
        'loaned',
    ];
}
