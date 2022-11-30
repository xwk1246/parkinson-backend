<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('missions')->delete();
        
        \DB::table('missions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'due_date' => '2022-11-14',
                'created_at' => '2022-11-13 08:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 2,
                'due_date' => '2022-11-14',
                'created_at' => '2022-11-13 08:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 3,
                'due_date' => '2022-11-14',
                'created_at' => '2022-11-13 08:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'user_id' => 3,
                'due_date' => '2022-11-30',
                'created_at' => '2022-11-13 08:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'user_id' => 5,
                'due_date' => '2022-11-30',
                'created_at' => '2022-11-13 08:00:00',
            )
        ));
        
        
    }
}