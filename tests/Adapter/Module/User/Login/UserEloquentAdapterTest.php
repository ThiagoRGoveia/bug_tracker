<?php

namespace Tests\Adapter\Module\User\Login;

use Tests\TestCase;
use App\Models\User as UserDb;
use Tracker\Domain\Module\User\Login\Port\UserPort;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tracker\Adapter\Module\User\Login\UserEloquentAdapter;


class UserEloquentAdapterTest extends TestCase
{
    use RefreshDatabase;

    public function testAdapterImplementsPort(): void
    {
        $adapter = new UserEloquentAdapter();
        self::assertInstanceOf(UserPort::class, $adapter);
    }

    public function testFindUserByEmail()
    {
        $adapter = new UserEloquentAdapter();
        $userModel = UserDb::factory()->create();

        $user = $adapter->findUserByEmail($userModel->email);

        $this->assertSame(
            $user->id,
            $userModel->id
        );

        $this->assertInstanceOf(UserDb::class, $user);
    }
}
