<?php

namespace Tracker\Adapter\Module\User\Delete;

use App\Models\User as UserDb;
use Tracker\Domain\Module\User\Delete\Entity\User;
use Tracker\Domain\Module\User\Delete\Port\UserPort;
use Tracker\Domain\Module\User\Delete\Exception\UserDoesNotExistException;

class UserEloquentAdapter implements UserPort
{
    private function findUserById(User $user): UserDb
    {
        return Userdb::find($user->getId());
    }
    public function delete(User $user): void
    {
        $userModel = $this->findUserById($user);
        if (is_null($userModel)) {
            throw new UserDoesNotExistException($user->getId());
        }
        $userModel->delete();
    }
}
