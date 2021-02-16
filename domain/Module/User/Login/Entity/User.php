<?php

namespace Tracker\Domain\Module\User\Login\Entity;

class User
{
    protected $isAuthenticated;

    public function __construct(bool $isAuthenticated)
    {
        $this->isAuthenticated = $isAuthenticated;
    }

    public function isAuthenticated()
    {
        return $this->isAuthenticated;
    }
}
