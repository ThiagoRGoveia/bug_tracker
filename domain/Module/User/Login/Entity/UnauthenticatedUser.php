<?php

namespace Tracker\Domain\Module\User\Login\Entity;

class UnauthenticatedUser extends User
{
    public function __construct()
    {
        parent::__construct(false);
    }
}
