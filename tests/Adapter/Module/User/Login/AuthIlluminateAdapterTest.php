<?php

namespace Tests\Adapter\Module\User\Login;

use Tests\TestCase;
use App\Models\User as Userdb;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ClientAuthSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tracker\Domain\Module\User\Login\Port\AuthPort;
use Tracker\Adapter\Module\User\Login\UserEloquentAdapter;
use Tracker\Adapter\Module\User\Login\AuthIlluminateAdapter;

class AuthIlluminateAdapterTest extends TestCase
{
    use RefreshDatabase;

    public function testAdapterImplementsPort(): void
    {
        $adapter = new AuthIlluminateAdapter(new UserEloquentAdapter());
        self::assertInstanceOf(AuthPort::class, $adapter);
    }

    public function testAuthenticationSuccess()
    {
        $this->seed(ClientAuthSeeder::class);

        $adapter = new AuthIlluminateAdapter(new UserEloquentAdapter());
        UserDb::create([
            'name' => 'fake',
            'email' => 'fake@fake.com',
            'password' => Hash::make('fake')
        ]);

        $user = $adapter->authenticate('fake@fake.com', 'fake');
        $this->assertTrue(
            $user->isAuthenticated()
        );
    }

    public function testAuthenticationFail()
    {
        $adapter = new AuthIlluminateAdapter(new UserEloquentAdapter());

        $user = $adapter->authenticate('nonexistent@fake.com', 'fake');

        $this->assertFalse(
            $user->isAuthenticated()
        );
    }
}
