<?php

namespace Tracker\Domain\Module\User\Login\Exception;

use Exception;

class AuthenticationFailedException extends Exception
{
    public function __construct()
    {
        parent::__construct('Incorrect email or password');
    }
}
