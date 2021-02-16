<?php

namespace Tracker\Domain\Module\User\Delete;

use Tracker\Domain\Module\User\Delete\Request;
use Tracker\Domain\Module\User\Delete\Response;
use Tracker\Domain\Module\User\Delete\Port\UserPort;

class Service
{
    public function __construct(UserPort $userPort)
    {
        $this->userPort = $userPort;
    }

    public function execute(Request $request): Response
    {
        $this->userPort->delete($request->getUser());

        return new Response('User has been successfully deleted');
    }
}
