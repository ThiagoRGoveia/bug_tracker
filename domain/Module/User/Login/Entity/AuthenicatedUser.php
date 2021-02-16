<?php

namespace Tracker\Domain\Module\User\Login\Entity;

use Tracker\Domain\Module\User\Login\Entity\User;

class AuthenicatedUser extends User
{
    private $id;
    private $token;

    public function __construct(string $id, string $token)
    {
        parent::__construct(true);
        $this->id = $id;
        $this->token = $token;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function isAuthenticated()
    {
        return $this->isAuthenticated;
    }
}
