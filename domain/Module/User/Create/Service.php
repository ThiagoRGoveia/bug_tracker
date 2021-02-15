<?php

namespace Tracker\Domain\Module\User\Create;

use Tracker\Domain\Module\User\Create\Request;
use Tracker\Domain\Module\User\Create\Response;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Exception\UserWithoutIdException;
use Tracker\Domain\Module\User\Create\Port\UserPort;

class Service
{
    private $userPort;

    public function __construct(
        UserPort $userPort
    ) {
        $this->userPort = $userPort;
    }

    public function execute(Request $request): Response
    {
        $user = $this->userPort->create(
            new User(
                $request->getName(),
                $request->getEmail(),
                $request->getPassword(),
                null
            )
        );

        if (is_null($user->getId())) {
            throw new UserWithoutIdException();
        }

        return new Response($user);
    }
}
