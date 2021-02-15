<?php

namespace Tests\Adapter\Module\User\Create;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCRUDTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCRUD()
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $user->update(['name' => 'Teste teste', 'email' => 'teste@teste.com']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Teste teste',
            'email' => 'teste@teste.com'
        ]);

        $user->delete();

        $this->assertSoftDeleted('users', [
            'id' => $user->id
        ]);
    }
}
