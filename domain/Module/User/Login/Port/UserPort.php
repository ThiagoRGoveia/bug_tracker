<?php

namespace Tracker\Domain\Module\User\Login\Port;

use App\Models\User;

interface UserPort
{
    public function findUserByEmail(string $email): User;
}
