<?php

namespace Tracker\Domain\Module\User\Create\Exception;

use Exception;

class UserWithoutIdException extends Exception
{
    public function __construct()
    {
        parent::__construct('Created user id cannot be null');
    }
}
