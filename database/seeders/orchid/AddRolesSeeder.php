<?php

namespace Database\Seeders\orchid;

use App\Interfaces\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Orchid\Platform\Models\Role;
use Symfony\Component\Console\Command\Command as StdOutput;
use Symfony\Component\Console\Output\ConsoleOutput;

class AddRolesSeeder extends Seeder
{
    public function run(): int
    {
        $roleList = [
            Roles::SUPER_ADMIN,
            Roles::ADMIN,
            Roles::USER,
        ];

        foreach ($roleList as $name) {
            /** @var User $user */
            $user = User::query()->create($this->getUser($name));
            (new ConsoleOutput)->writeln("{$user->name} added");
            /** @var Role $role */
            $role = Role::query()->create($this->getRole($name));
            DB::table("role_users")->insert([
                'user_id' => $user->id,
                'role_id' => $role->id,
            ]);
            (new ConsoleOutput)->writeln("'{$role->name}' added to {$user->name}");
        }

        return StdOutput::SUCCESS;
    }

    private function getFile(string $name): bool|string
    {
        $path = database_path() . "/seeders/orchid/permissions";
        return file_get_contents("$path/$name.json");
    }

    private function getRole(string $name): array
    {
        $roles = [
            Roles::SUPER_ADMIN => [
                'slug' => Roles::SUPER_ADMIN,
                'name' => 'Super Admin',
                'permissions' => $this->getFile(Roles::SUPER_ADMIN),
            ],
            Roles::ADMIN => [
                'slug' => Roles::ADMIN,
                'name' => 'Admin',
                'permissions' => $this->getFile(Roles::ADMIN),
            ],
            Roles::USER => [
                'slug' => Roles::USER,
                'name' => 'User',
                'permissions' => $this->getFile(Roles::USER),
            ],
        ];

        return $roles[$name];
    }

    private function getUser(string $name): array
    {
        $users = [
            Roles::SUPER_ADMIN => [
                'name' => 'Den',
                'email' => 'vomehad@yandex.ru',
                'password' => Hash::make('keys'),
            ],
            Roles::ADMIN => [
                'name' => 'Admin',
                'email' => 'admin@local.com',
                'password' => Hash::make('keys'),
            ],
            Roles::USER => [
                'name' => 'User',
                'email' => 'user@simple.com',
                'password' => Hash::make('keys'),
            ],
        ];

        return $users[$name];
    }
}
