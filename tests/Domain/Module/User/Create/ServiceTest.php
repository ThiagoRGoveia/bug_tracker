<?php

namespace Tests\Domain\Module\User\Create;

use Exception;
use PHPUnit\Framework\TestCase;
use Tracker\Domain\Module\User\Create\Request;
use Tracker\Domain\Module\User\Create\Service;
use Tracker\Domain\Module\User\Create\Response;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Port\UserPort;
use Tracker\Domain\Module\User\Create\Entity\Password;
use Tracker\Domain\Module\User\Create\Exception\UserWithoutIdException;
use Tracker\Domain\Module\User\Create\Port\PasswordPort;

class ServiceTest extends TestCase
{
    /**
     * @dataProvider userInformationReturnsResponseProvider
     */
    public function testExecuteReturnResponse(
        Response $expected,
        Request $request,
        UserPort $userPort,
        PasswordPort $passwordPort
    ): void {

        $service = new Service(
            $userPort,
            $passwordPort
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
                    new Password('hashedFake'),
                    null
                )
            )
            ->willReturn(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('hashedFake'),
                    'fake'
                )
            );
        $passwordPort = $this->createMock(PasswordPort::class);
        $passwordPort->expects($this->once())
            ->method('generateHash')
            ->with('fake')
            ->willReturn(
                new Password('hashedFake')
            );
        return [
            'user' => [
                'expected' => new Response(
                    new User(
                        'fake',
                        'fake@fake.com',
                        new Password('hashedFake'),
                        'fake'
                    )
                ),
                'request' => new Request(
                    'fake',
                    'fake@fake.com',
                    'fake'
                ),
                'userPort' => $userPort,
                'passwordPort' => $passwordPort
            ]
        ];
    }

    /**
     * @dataProvider userInformationReturnsExceptionProvider
     */
    public function testExecuteThrowsException(
        Exception $expected,
        Request $request,
        UserPort $userPort,
        PasswordPort $passwordPort
    ): void {

        $service = new Service(
            $userPort,
            $passwordPort
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
                    new Password('hashedFake'),
                    null
                )
            )
            ->willReturn(
                new User(
                    'fake',
                    'fake@fake.com',
                    new Password('hashedFake'),
                    null
                )
            );
        $passwordPort = $this->createMock(PasswordPort::class);
        $passwordPort->expects($this->once())
            ->method('generateHash')
            ->with('fake')
            ->willReturn(
                new Password('hashedFake')
            );
        return [
            'user' => [
                'expected' => new UserWithoutIdException(),
                'request' => new Request(
                    'fake',
                    'fake@fake.com',
                    'fake'
                ),
                'userPort' => $userPort,
                'passwordPort' => $passwordPort
            ]
        ];
    }
}
