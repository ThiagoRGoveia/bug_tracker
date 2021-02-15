<?php

namespace Tracker\Domain\Module\User\Create\Port;

use Tracker\Domain\Module\User\Create\Entity\Password;


interface PasswordPort
{
    public function generateHash(string $password): Password;
    public function validatePassword(string $password, Password $storedPassword): bool;
}
