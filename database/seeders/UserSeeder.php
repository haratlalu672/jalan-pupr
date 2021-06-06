<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Arif Agung',
            'username' => 'KUPTD',
            'password' => bcrypt('secret'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Didiek',
            'username' => 'pengelola',
            'password' => bcrypt('secret'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Rahman',
            'username' => 'pemeliharaan',
            'password' => bcrypt('secret'),
            'role_id' => 3
        ]);
        User::create([
            'name' => 'Zulkipli',
            'username' => 'admin',
            'password' => bcrypt('secret'),
            'role_id' => 4
        ]);
    }
}
