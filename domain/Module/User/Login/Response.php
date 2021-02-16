<?php

namespace Tracker\Domain\Module\User\Login;

use Tracker\Domain\Module\User\Login\Entity\User;

class Response
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
