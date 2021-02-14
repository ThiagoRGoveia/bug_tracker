<?php

namespace Tracker\Domain\Module\User\Port;

use Tracker\Domain\Module\User\Entity\Password;


interface PasswordPort
{
    public static function generate(string $password): Password;
}
