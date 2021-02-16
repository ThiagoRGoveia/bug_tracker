<?php

namespace Tracker\Domain\Module\User\Delete;

use Tracker\Domain\Module\User\Delete\Entity\User;

class Request
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
