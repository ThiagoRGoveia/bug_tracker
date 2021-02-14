<?php

namespace Tracker\Domain\Module\User\Create\Entity;


class User
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

    public function getCredentials(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password->getPasswordString()
        ];
    }
}
