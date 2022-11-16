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
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 2,
                'due_date' => '2022-11-14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 3,
                'due_date' => '2022-11-14',
                'created_at' => NULL,
                'updated_at' => NULL,
            )
        ));
        
        
    }
}