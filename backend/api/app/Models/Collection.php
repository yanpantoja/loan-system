<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'collection_type',
        'loaned',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function collection()
    {
        return $this->morphTo();
    }
}
