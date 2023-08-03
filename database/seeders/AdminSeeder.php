<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'den';
        $user->email = 'vomehad@yandex.ru';
        $user->password = Hash::make('keys');
        $user->permissions = [
            "platform.index" => true,
            "platform.systems.roles" => true,
            "platform.systems.users" => true,
            "platform.systems.attachment" => true
        ];

        $user->save();
    }
}
