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

        DB::table('teachers')->insert([
            'name' => 'Abay',
            'surname' => 'Kudaibergenov',
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Teacher',
                'email' => 'teacher@teach.com',
                'password' => bcrypt('123456789'),
                'role' => 5,
                'teacherId' => 2,
                'studentId' => null,
                'adviserId' => null
            ], [
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


        DB::table('educational_programs')->insert([
            'title' => 'MKM'
        ]);

        DB::table('groups')->insert([
            'title' => 'MKM2015',
            'course' => 1,
            'edProgram_id' => 1,
            'adviser_id' => 1
        ]);

        DB::table('students')->insert([
            'name' => 'Akhmet',
            'surname' => 'Baitursynov',
            'gr_id' => 1,
            'user_id' => 1
        ]);

        DB::table('advisers')->insert([
            'name' => 'Shokan',
            'surname' => 'Ualikhanov',
        ]);


    }
}
