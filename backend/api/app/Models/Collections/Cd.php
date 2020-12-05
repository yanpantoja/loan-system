<?php

namespace App\Models\Collections;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    protected $fillable = [
        'name',
        'loaned',
    ];

    public function collections()
    {
        return $this->morphOne(Collection::class, 'collection');
    }
}
