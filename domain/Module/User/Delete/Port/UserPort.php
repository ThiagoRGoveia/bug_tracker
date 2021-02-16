<?php

namespace Tracker\Domain\Module\User\Delete\Port;

use Tracker\Domain\Module\User\Delete\Entity\User;


interface UserPort
{
    public function delete(User $user): void;
}
