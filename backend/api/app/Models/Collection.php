<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
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
