<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert(
            [
                'user_id' => 1
            ]
        );
        DB::table('notifications')->insert(
            [
                'user_id' => 2
            ]
        );
    }
}
