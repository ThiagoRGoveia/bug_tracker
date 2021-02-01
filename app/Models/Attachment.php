<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'bug_id',
        'label',
        'url'
    ];

    function bug()
    {
        return $this->belongsTo(Bug::class);
    }
}
