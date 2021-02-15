<?php

namespace Tracker\Domain\Module\User\Create;

use Tracker\Domain\Module\User\Create\Entity\Password;

class Request
{
    private $name;
    private $email;
    private $password;

    public function __construct(string $name, string $email, Password $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }
}
