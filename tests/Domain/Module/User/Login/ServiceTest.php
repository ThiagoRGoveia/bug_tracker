<?php

namespace Tests\Domain\Module\User\Login;

use Exception;
use PHPUnit\Framework\TestCase;
use Tracker\Domain\Module\User\Login\Request;
use Tracker\Domain\Module\User\Login\Service;
use Tracker\Domain\Module\User\Login\Response;
use Tracker\Domain\Module\User\Login\Port\AuthPort;
use Tracker\Domain\Module\User\Login\Entity\AuthenicatedUser;
use Tracker\Domain\Module\User\Login\Entity\UnauthenticatedUser;
use Tracker\Domain\Module\User\Login\Exception\AuthenticationFailedException;

class ServiceTest extends TestCase
{
    /**
     * @dataProvider userLoginInformationReturnsResponseProvider
     */
    public function testExecuteReturnResponse(
        Response $expected,
        Request $request,
        AuthPort $authPort
    ) {
        $service = new Service(
            $authPort
        );

        self::assertEquals(
            $expected,
            $service->execute($request)
        );
    }

    public function userLoginInformationReturnsResponseProvider()
    {
        $authPort = $this->createMock(AuthPort::class);
        $authPort->expects($this->once())
            ->method('authenticate')
            ->with('fakeEmail', 'fakePassword')
            ->willReturn(
                new AuthenicatedUser(
                    'fakeId',
                    'fakeToken'
                )
            );
        return [
            'userExists' => [
                'expected' => new Response(
                    new AuthenicatedUser(
                        'fakeId',
                        'fakeToken'
                    )
                ),
                'request' => new Request(
                    'fakeEmail',
                    'fakePassword'
                ),
                'authPort' => $authPort
            ]
        ];
    }

    /**
     * @dataProvider userLoginInformationReturnsExceptionProvider
     */
    public function testExecuteThrowsException(
        Exception $expected,
        Request $request,
        AuthPort $authPort
    ): void {

        $service = new Service(
            $authPort
        );

        $this->expectExceptionObject($expected);

        $service->execute($request);
    }

    public function userLoginInformationReturnsExceptionProvider()
    {
        $authPort = $this->createMock(AuthPort::class);
        $authPort->expects($this->once())
            ->method('authenticate')
            ->with('fakeEmail', 'fakePassword')
            ->willReturn(
                new UnauthenticatedUser()
            );
        return [
            'userExists' => [
                'expected' => new AuthenticationFailedException(),
                'request' => new Request(
                    'fakeEmail',
                    'fakePassword'
                ),
                'authPort' => $authPort
            ]
        ];
    }
}
