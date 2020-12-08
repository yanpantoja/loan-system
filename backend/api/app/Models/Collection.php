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


    public function getLoanedAttribute($value)
    {
        if($value === 0) {
            return "Não";
        }

        return "Sim";
    }

    public function setLoanedAttribute($value)
    {
       if($value == "Não") {
           return $this->attributes['loaned'] = 0;
       }

       return $this->attributes['loaned'] = 1;
    }

}
