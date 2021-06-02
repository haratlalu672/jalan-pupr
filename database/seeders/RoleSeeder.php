<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'KUPTD']);
        Role::create(['name' => 'Pengelola']);
        Role::create(['name' => 'Pemeliharaan']);
        Role::create(['name' => 'Administrator']);
    }
}
