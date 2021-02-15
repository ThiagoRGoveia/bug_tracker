<?php

namespace Tests\Adapter\Module\User\Create;

use Tests\TestCase;
use Tracker\Domain\Module\User\Create\Port\PasswordPort;
use Tracker\Adapter\Module\User\Create\PasswordIlluminateAdapter;

class PasswordIlluminateAdapterTest extends TestCase
{
    public function testAdapterImplementsPort(): void
    {
        $adapter = new PasswordIlluminateAdapter();
        self::assertInstanceOf(PasswordPort::class, $adapter);
    }

    public function testPasswordHashCreationAndValidation()
    {
        $adapter = new PasswordIlluminateAdapter();
        $password = 'fake-password';
        $hashedPassword = $adapter->generateHash($password);

        $this->assertNotSame($password, $hashedPassword->getPassword());

        $this->assertTrue($adapter->validatePassword($password, $hashedPassword));
    }
}
