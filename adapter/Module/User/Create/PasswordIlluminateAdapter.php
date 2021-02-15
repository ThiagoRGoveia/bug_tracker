<?php

namespace Tracker\Adapter\Module\User\Create;

use Illuminate\Support\Facades\Hash;
use Tracker\Domain\Module\User\Create\Entity\Password;
use Tracker\Domain\Module\User\Create\Port\PasswordPort;

class PasswordIlluminateAdapter implements PasswordPort
{
    public function generateHash(string $password): Password
    {
        return new Password(Hash::make($password));
    }

    public function validatePassword(string $password, Password $storedPassword): bool
    {
        return Hash::check($password, $storedPassword->getPassword());
    }
}
