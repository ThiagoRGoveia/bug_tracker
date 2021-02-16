<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_personal_access_clients')
            ->insert([
                'id' => 1,
                'client_id' => '92bf49e4-27b8-40e6-bc71-5ccb0851cfa6',
                'created_at' => '2021-02-16 19:12:40',
                'updated_at' => '2021-02-16 19:12:40'
            ]);

        DB::table('oauth_clients')
            ->insert([
                'id' => '92bf49e4-27b8-40e6-bc71-5ccb0851cfa6',
                'name' => 'dummy',
                'secret' => 'xZ1XrWpdWpfXc30JjgprifrzmnQOx5ub0Ynbq9El',
                'redirect' => 'http://localhost',
                'personal_access_client' => true,
                'password_client' => false,
                'revoked' => false,
                'created_at' => '2021-02-16 19:12:40',
                'updated_at' => '2021-02-16 19:12:40'
            ]);
    }
}
