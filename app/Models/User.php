<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Uuids, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function bugsCreated()
    {
        return $this->hasMany(Bug::class);
    }

    function bugsAssigned()
    {
        return $this->belongsToMany(Bug::class);
    }

    function actions()
    {
        return $this->belongsTo(History::class);
    }

    function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
