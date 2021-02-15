<?php

namespace Tracker\Domain\Module\User\Create\Port;

use Tracker\Domain\Module\User\Create\Entity\Password;


interface PasswordPort
{
    public static function generateHash(string $password): Password;
}
