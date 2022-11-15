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
                'id' => 2,
                'user_id' => 1,
                'date' => '2022-11-14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}