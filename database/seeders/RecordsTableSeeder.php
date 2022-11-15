<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('records')->delete();
        
        \DB::table('records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'mission_id' => 2,
                'date' => '2022-11-14',
                'result' => 100,
                'status' => '未處理',
                'doctor_comment' => '說說',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}