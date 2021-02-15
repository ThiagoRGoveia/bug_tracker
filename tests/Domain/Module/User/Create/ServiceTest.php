<?php

namespace Domain\Module\User\Create;

use Exception;
use PHPUnit\Framework\TestCase;
use Tracker\Domain\Module\User\Create\Request;
use Tracker\Domain\Module\User\Create\Service;
use Tracker\Domain\Module\User\Create\Response;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Port\UserPort;
use Tracker\Domain\Module\User\Create\Entity\Password;
use Tracker\Domain\Module\User\Create\Exception\UserWithoutIdException;

class ServiceTest extends TestCase
{
    /**
     * @dataProvider userInformationReturnsResponseProvider
     */
    public function testExecuteReturnResponse(
        Response $expected,
        Request $request,
        UserPort $userPort
    ): void {

        $service = new Service(
            $userPort
        );

        self::assertEquals(
            $expected,
            $service->execute($request)
        );
    }

    public function userInformationReturnsResponseProvider(): array
    {
        $userPort = $this->createMock(UserPort::class);
        $userPort->expects($this->once())
            ->method('create')
            ->with(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('fake'),
                    null
                )
            )
            ->willReturn(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('fake'),
                    'fake'
                )
            );
        return [
            'user' => [
                'expected' => new Response(
                    new User(
                        'fake',
                        'fake@fake.com',
                        new Password('fake'),
                        'fake'
                    )
                ),
                'request' => new Request(
                    'fake',
                    'fake@fake.com',
                    new Password('fake')
                ),
                'userPort' => $userPort
            ]
        ];
    }

    /**
     * @dataProvider userInformationReturnsExceptionProvider
     */
    public function testExecuteThrowsException(
        Exception $expected,
        Request $request,
        UserPort $userPort
    ): void {

        $service = new Service(
            $userPort
        );

        $this->expectExceptionObject($expected);

        $service->execute($request);
    }

    public function userInformationReturnsExceptionProvider(): array
    {
        $userPort = $this->createMock(UserPort::class);
        $userPort->expects($this->once())
            ->method('create')
            ->with(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('fake'),
                    null
                )
            )
            ->willReturn(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('fake'),
                    null
                )
            );
        return [
            'user' => [
                'expected' => new UserWithoutIdException(),
                'request' => new Request(
                    'fake',
                    'fake@fake.com',
                    new Password('fake')
                ),
                'userPort' => $userPort
            ]
        ];
    }
}
