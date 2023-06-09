<?php

namespace Database\Seeders\orchid;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Orchid\Platform\Models\Role;

class AddRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->where(['name' => 'super_admin'])->create();
        $roles = Role::query()->get();
        dump(__FILE__.":".(__LINE__+1));
        dd(__METHOD__, $roles);
    }
}
