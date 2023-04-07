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
        Role::create([
            'name'          =>   'administrateur',
            'role_type'       =>   'AD',
            ]);
        Role::create([
            'name'          =>   'employee',
            'role_type'       =>   'EMP',
            ]);
    }
}
