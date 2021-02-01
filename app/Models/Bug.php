<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bug extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'due_date',
        'reproducible',
        'severity',
        'status',
        'description'
    ];

    function creator()
    {
        return $this->belongsTo(User::class);
    }

    function project()
    {
        return $this->belongsTo(Project::class);
    }

    function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    function assignedTo()
    {
        return $this->belongsToMany(User::class);
    }

    function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
