<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$XvUEE4iuJ61V3YK9Xomv6eLxIiTkBQgGuDj7W2NqBjAADHBGZZf5i',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
