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
                'password'       => '$2y$10$QteYsMQ/sahaDn4fABIRaeDR2YkzySG4tm/4QBsqS3brP4.63s2Mm',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Moderator',
                'email'          => 'mod@mod.com',
                'password'       => '$2y$10$QteYsMQ/sahaDn4fABIRaeDR2YkzySG4tm/4QBsqS3brP4.63s2Mm',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'user',
                'email'          => 'user@user.com',
                'password'       => '$2y$10$QteYsMQ/sahaDn4fABIRaeDR2YkzySG4tm/4QBsqS3brP4.63s2Mm',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
