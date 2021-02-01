<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bug_id',
        'body'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function bug()
    {
        return $this->belongsTo(Bug::class);
    }
}
