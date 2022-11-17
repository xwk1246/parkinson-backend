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
                'user_id' => 2,
                'mission_id' => 1,
                'result' => '{}',
                'status' => '未處理',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 1
            ),
            array (
                'id' => 2,
                'user_id' => 2,
                'mission_id' => 1,
                'result' => '{}',
                'status' => '待檢閱',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 2
            ),
            array (
                'id' => 3,
                'user_id' => 2,
                'mission_id' => 1,
                'result' => '{}',
                'status' => '已檢閱',
                'doctor_comment' => 'Good',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 3
            ),
            array (
                'id' => 4,
                'user_id' => 2,
                'mission_id' => 2,
                'result' => '{}',
                'status' => '未處理',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 1
            ),
            array (
                'id' => 5,
                'user_id' => 2,
                'mission_id' => 2,
                'result' => '{}',
                'status' => '待檢閱',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 2
            ),
            array (
                'id' => 6,
                'user_id' => 2,
                'mission_id' => 2,
                'result' => '{}',
                'status' => '已檢閱',
                'doctor_comment' => 'Good',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 3
            ),
            array (
                'id' => 7,
                'user_id' => 3,
                'mission_id' => 3,
                'result' => '{}',
                'status' => '未處理',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 1
            ),
            array (
                'id' => 8,
                'user_id' => 3,
                'mission_id' => 3,
                'result' => '{}',
                'status' => '待檢閱',
                'doctor_comment' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 2
            ),
            array (
                'id' => 9,
                'user_id' => 3,
                'mission_id' => 3,
                'result' => '{}',
                'status' => '已檢閱',
                'doctor_comment' => 'Good',
                'created_at' => NULL,
                'updated_at' => NULL,
                'category' => 3
            ),
            
        ));
        
        
    }
}