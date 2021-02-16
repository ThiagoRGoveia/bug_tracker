<?php

namespace Tracker\Domain\Module\User\Create;

use Tracker\Domain\Module\User\Create\Request;
use Tracker\Domain\Module\User\Create\Response;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Exception\UserWithoutIdException;
use Tracker\Domain\Module\User\Create\Port\PasswordPort;
use Tracker\Domain\Module\User\Create\Port\UserPort;

class Service
{
    private $userPort;

    public function __construct(
        UserPort $userPort,
        PasswordPort $passwordPort
    ) {
        $this->userPort = $userPort;
        $this->passwordPort = $passwordPort;
    }

    public function execute(Request $request): Response
    {
        $password = $this->passwordPort->generateHash($request->getPassword());
        $user = $this->userPort->create(
            new User(
                $request->getName(),
                $request->getEmail(),
                $password,
                null
            )
        );

        if (is_null($user->getId())) {
            throw new UserWithoutIdException();
        }

        return new Response($user);
    }
}
