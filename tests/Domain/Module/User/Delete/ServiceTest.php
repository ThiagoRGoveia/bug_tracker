<?php

namespace Tests\Domain\Module\User\Delete;

use Exception;
use Tests\TestCase;
use Tracker\Domain\Module\User\Delete\Entity\User;
use Tracker\Domain\Module\User\Delete\Exception\UserDoesNotExistException;
use Tracker\Domain\Module\User\Delete\Request;
use Tracker\Domain\Module\User\Delete\Service;
use Tracker\Domain\Module\User\Delete\Response;
use Tracker\Domain\Module\User\Delete\Port\UserPort;

class ServiceTest extends TestCase
{
    /**
     * @dataProvider userToBeSuccessfullyDeletedProvider
     */
    public function testExecuteReturnResponse(
        Response $expected,
        Request $request,
        UserPort $userPort
    ) {
        $service = new Service(
            $userPort
        );

        $response = $service->execute($request);

        $this->assertEquals(
            $expected,
            $response
        );
    }

    public function userToBeSuccessfullyDeletedProvider()
    {
        $userPort = $this->createMock(UserPort::class);
        $userPort->expects($this->once())
            ->method('delete')
            ->with(
                new User('fakeId')
            );
        return [
            'delete-user' => [
                'expected' => new Response('User has been successfully deleted'),
                'request' => new Request(
                    new User('fakeId')
                ),
                'userPort' => $userPort
            ]
        ];
    }

    /**
     * @dataProvider userDoesNotExistProvider
     */
    public function testRequestThrowsException(
        Exception $expected,
        Request $request,
        UserPort $userPort
    ) {
        $service = new Service(
            $userPort
        );

        $this->expectExceptionObject($expected);

        $service->execute($request);
    }

    public function userDoesNotExistProvider()
    {
        $userPort = $this->createMock(UserPort::class);
        $userPort->expects($this->once())
            ->method('delete')
            ->with(
                new User('fakeId')
            )
            ->willThrowException(new UserDoesNotExistException());
        return [
            'user-missing' => [
                'expected' => new UserDoesNotExistException(),
                'request' => new Request(
                    new User('fakeId')
                ),
                'userPort' => $userPort
            ]
        ];
    }
}
