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
            'name' => 'H. Wahid Ramadani',
            'username' => 'KUPTD',
            'password' => bcrypt('banjarmasin'),
            'role_id' => 1,
            'profil' => 'user.png'
        ]);
        User::create([
            'name' => 'Didiek',
            'username' => 'pengelola',
            'password' => bcrypt('banjarmasin'),
            'role_id' => 2,
            'profil' => 'user.png'
        ]);
        User::create([
            'name' => 'Rahman',
            'username' => 'pemeliharaan',
            'password' => bcrypt('banjarmasin'),
            'role_id' => 3,
            'profil' => 'user.png'
        ]);
        User::create([
            'name' => 'Zulkipli',
            'username' => 'admin',
            'password' => bcrypt('banjarmasin'),
            'role_id' => 4,
            'profil' => 'user.png'
        ]);
    }
}
