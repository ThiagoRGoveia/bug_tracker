<?php

namespace Tracker\Domain\Module\User\Login;

use Tracker\Domain\Module\User\Login\Exception\AuthenticationFailedException;
use Tracker\Domain\Module\User\Login\Request;
use Tracker\Domain\Module\User\Login\Port\AuthPort;

class Service
{
    private $authPort;

    public function __construct(AuthPort $authPort)
    {
        $this->authPort = $authPort;
    }

    public function execute(Request $request): Response
    {
        $user = $this->authPort->authenticate(
            $request->getEmail(),
            $request->getPassword()
        );

        if (!$user->isAuthenticated()) {
            throw new AuthenticationFailedException();
        }

        return new Response($user);
    }
}
