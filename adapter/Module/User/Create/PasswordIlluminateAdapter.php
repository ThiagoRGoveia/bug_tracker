<?php

namespace Tracker\Adapter\Module\User\Create;

use Illuminate\Support\Facades\Hash;
use Tracker\Domain\Module\User\Entity\Password;
use Tracker\Domain\Module\User\Port\PasswordPort;

class PasswordIlluminateAdapter implements PasswordPort
{
    public static function generate(string $password): Password
    {
        return new Password(Hash::make($password));
    }
}
