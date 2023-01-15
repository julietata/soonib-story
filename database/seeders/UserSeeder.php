<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Tataa',
                'gender' => 'Female',
                'email' => 'tatatata@binus.com',
                'password' => bcrypt('tata123')
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Sheilaa',
                'gender' => 'Female',
                'email' => 'sheila@binus.com',
                'password' => bcrypt('sheila123')
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'gender' => ' ',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin123'),
                'role'=>'admin'
            ]
        );
    }
}
