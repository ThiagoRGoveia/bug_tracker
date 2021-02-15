<?php

namespace Tracker\Domain\Module\User\Create\Entity;


class User
{
    private $name;
    private $email;
    private $password;
    private $id;

    public function __construct(string $name, string $email, Password $password, ?string $id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
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

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCredentials(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password->getPassword()
        ];
    }
}
