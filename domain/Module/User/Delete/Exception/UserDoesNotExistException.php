<?php

namespace Tracker\Domain\Module\User\Delete\Exception;

use Exception;

class UserDoesNotExistException extends Exception
{
    public function __construct()
    {
        parent::__construct('User not found');
    }
}
