<?php

namespace Tracker\Adapter\Module\User\Create;

use App\Models\User as UserDb;
use Tracker\Domain\Module\User\Entity\User;
use Tracker\Domain\Module\User\Port\UserPort;

class UserEloquentAdapter implements UserPort
{
    public static function create(User $user)
    {
        return UserDb::create($user->getCredentials());
    }
}
