<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 0,
        ]);

        DB::table('users')->insert([
            'name' => 'Department Admin',
            'email' => 'dadmin@admin.com',
            'password' => bcrypt('dadmin'),
            'role' => 4,
        ]);


        DB::table('users')->insert([
            [
                'name' => 'Adilet',
                'email' => 'ad@ad.ad',
                'password' => bcrypt('123456789'),
                'role' => 3,
                'teacherId' => null,
                'studentId' => 1,
                'adviserId' => null
            ], [
                'name' => 'Adviser',
                'email' => 'adviser@a.a',
                'password' => bcrypt('123456789'),
                'role' => 2,
                'teacherId' => null,
                'studentId' => null,
                'adviserId' => 1
            ]
        ]);

    }
}
