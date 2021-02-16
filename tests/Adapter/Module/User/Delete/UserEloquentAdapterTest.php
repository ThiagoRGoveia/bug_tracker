<?php

namespace Tests\Adapter\Module\User\Delete;

use Tests\TestCase;
use App\Models\User as UserDb;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tracker\Domain\Module\User\Delete\Entity\User;
use Tracker\Domain\Module\User\Delete\Port\UserPort;
use Tracker\Adapter\Module\User\Delete\UserEloquentAdapter;


class UserEloquentAdapterTest extends TestCase
{
    use RefreshDatabase;

    public function testAdapterImplementsPort(): void
    {
        $adapter = new UserEloquentAdapter();
        self::assertInstanceOf(UserPort::class, $adapter);
    }

    public function testDelete()
    {
        $adapter = new UserEloquentAdapter();

        $user = UserDb::factory()->create();

        $adapter->delete(new User($user->id));

        $this->assertSoftDeleted('users', [
            'id' => $user->id
        ]);
    }
}
