<?php

namespace Tracker\Domain\Module\User\Create;

use Tracker\Domain\Module\User\Create\Entity\User;

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
