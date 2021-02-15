<?php

namespace Tracker\Adapter\Module\User\Create;

use Illuminate\Support\Facades\Hash;
use Tracker\Domain\Module\User\Create\Entity\Password;
use Tracker\Domain\Module\User\Create\Port\PasswordPort;

class PasswordIlluminateAdapter implements PasswordPort
{
    public static function generateHash(string $password): Password
    {
        return new Password(Hash::make($password));
    }
}
