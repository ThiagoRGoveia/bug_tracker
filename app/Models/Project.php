<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_id',
        'description',
        'start',
        'end'
    ];

    function team()
    {
        return $this->belongsTo(Team::class);
    }
}
