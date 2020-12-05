<?php

namespace App\Models\Collections;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'loaned',
    ];

    public function requirements()
    {
        return $this->morphOne(Collection::class, 'collection');
    }

}
