<?php

namespace Tracker\Domain\Module\User\Create\Port;

use Tracker\Domain\Module\User\Create\Entity\User;

interface UserPort
{
    public function create(User $user): User;
}
