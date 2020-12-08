<?php

namespace App\Models\Collections;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'name',
    ];

    public function collections()
    {
        return $this->morphOne(Collection::class, 'collection');
    }

}
