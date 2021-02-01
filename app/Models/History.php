<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bug_id',
        'user_id',
        'label'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
