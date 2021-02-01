<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    function projects()
    {
        return $this->hasMany(Project::class);
    }

    function members()
    {
        return $this->belongsToMany(User::class);
    }
}
