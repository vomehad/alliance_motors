<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Output\ConsoleOutput;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::query()->where(['email' => 'admin@admin.com'])->exists()) {
            $this->addAdmin();
        }

    }

    private function addAdmin(): void
    {
        $user = new User();
        $user->name = 'den';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');
        $user->permissions = [
            "platform.index" => true,
            "platform.systems.roles" => true,
            "platform.systems.users" => true,
            "platform.systems.attachment" => true
        ];

        if ($user->save()) {
            (new ConsoleOutput())->writeln("Администратор $user->email");
        }
    }
}
