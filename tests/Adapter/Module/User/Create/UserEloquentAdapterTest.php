<?php

namespace Tests\Adapter\Module\User\Create;

use Tests\TestCase;
use Tracker\Domain\Module\User\Create\Entity\User;
use Tracker\Domain\Module\User\Create\Port\UserPort;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tracker\Domain\Module\User\Create\Entity\Password;
use Tracker\Adapter\Module\User\Create\UserEloquentAdapter;

class UserEloquentAdapterTest extends TestCase
{
    use DatabaseMigrations;

    public function testAdapterImplementsPort(): void
    {
        $adapter = new UserEloquentAdapter();
        self::assertInstanceOf(UserPort::class, $adapter);
    }

    public function testUserCreation()
    {
        $adapter = new UserEloquentAdapter();

        $userModel = $adapter->create(
            new User(
                'fake',
                'fake@fake.com',
                new Password('fake'),
                null
            )
        );

        $this->assertNotNull($userModel->getId());

        $this->assertDatabaseHas('users', [
            'id' => $userModel->getId(),
            'email' => $userModel->getEmail(),
            'name' => $userModel->getName(),
        ]);
    }
}
