<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    protected $appends = ['user_name'];

    protected $maps = [
        'name' => 'user_name',
    ];

    protected $hidden = ['name'];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function getUserNameAttribute()
    {
        return $this->attributes['name'];
    }

}
