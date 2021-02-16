<?php

namespace Tracker\Domain\Module\User\Login\Port;

use Tracker\Domain\Module\User\Login\Entity\User;

interface AuthPort
{
    public function authenticate(string $email, string $password): User;
}
