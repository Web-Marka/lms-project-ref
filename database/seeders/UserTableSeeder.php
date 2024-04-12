<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name'      =>'Admin',
                'username'  => 'admin',
                'email'     =>'admin@gmail.com',
                'password'  => Hash::make('12345'),
                'role'      =>'Admin',
                'status'    =>'1',
            ],

            // Instructor

            [
                'name'      =>'Instructor',
                'username'  => 'instructor',
                'email'     =>'instructor@gmail.com',
                'password'  => Hash::make('12345'),
                'role'      =>'instructor',
                'status'    =>'1',
            ],

            // User

            [
                'name'      =>'User',
                'username'  => 'user',
                'email'     =>'user@gmail.com',
                'password'  => Hash::make('12345'),
                'role'      =>'user',
                'status'    =>'1',
            ],

        ]);
    }
}
