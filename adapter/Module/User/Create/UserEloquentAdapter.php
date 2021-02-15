<?php

namespace Tracker\Adapter\Module\User\Create;

use App\Models\User as UserDb;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Port\UserPort;

class UserEloquentAdapter implements UserPort
{
    public function create(User $user): User
    {
        $userResponseModel = UserDb::create($user->getCredentials());
        return new User(
            $user->getName(),
            $user->getEmail(),
            $user->getPassword(),
            $userResponseModel->id
        );
    }
}
