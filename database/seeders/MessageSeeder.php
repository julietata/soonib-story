<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(
            [
                'user_id' => 1,
                'content' => 'hehehe gatau mo tulis apa tapi yaudahlah yaa',
                'timestamp' => Carbon::now()
            ]
        );

        DB::table('messages')->insert(
            [
                'user_id' => 1,
                'content' => 'halo nama saya tata yang baik hati dan tidak sombong',
                'timestamp' => Carbon::now()
            ]
        );

        DB::table('messages')->insert(
            [
                'user_id' => 2,
                'content' => 'hehehe gatau mo tulis apa tapi yaudahlah yaa',
                'timestamp' => Carbon::now()
            ]
        );

        DB::table('messages')->insert(
            [
                'user_id' => 2,
                'content' => 'halo nama saya sela yang baik hati dan tidak sombong',
                'timestamp' => Carbon::now()
            ]
        );
    }
}
