<?php

namespace Tracker\Domain\Module\User\Delete\Entity;

class User
{
    private $id;
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
