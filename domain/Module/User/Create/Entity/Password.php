<?php

namespace Tracker\Domain\Module\User\Create\Entity;


class Password
{
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
