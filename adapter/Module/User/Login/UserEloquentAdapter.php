<?php

namespace Tracker\Adapter\Module\User\Login;

use App\Models\User;
use Tracker\Domain\Module\User\Login\Port\UserPort;

class UserEloquentAdapter implements UserPort
{
    public function findUserByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
}
