<?php

namespace Database\Seeders;

use App\Models\Record;
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
        
        //'手部拍打', '手部捏握', '手掌翻面', '抬腳'
        \DB::table('records')->delete();

        Record::create([
            'id' => 1,
            'user_id' => 2,
            'mission_id' => 1,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部拍打'
        ]);
        Record::create([
            'id' => 2,
            'user_id' => 2,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'mission_id' => 1,
            'result' => '{"left":87,"right":174}',
            'status' => '待檢閱',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部捏握'
        ]);
        Record::create([
            'id' => 3,
            'user_id' => 2,
            'mission_id' => 1,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'result' => '{"left":87,"right":174}',
            'status' => '已檢閱',
            'doctor_comment' => 'Good',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手掌翻面'
        ]);
        Record::create([
            'id' => 4,
            'user_id' => 2,
            'mission_id' => 2,
            'result' => NULL,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'status' => '未處理',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部拍打'
        ]);
        Record::create([
            'id' => 5,
            'user_id' => 2,
            'mission_id' => 2,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'result' => '{"left":87,"right":174}',
            'status' => '待檢閱',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部捏握'
        ]);
        Record::create([
            'id' => 6,
            'user_id' => 2,
            'mission_id' => 2,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'result' => '{"left":87,"right":174}',
            'status' => '已檢閱',
            'doctor_comment' => 'Good',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手掌翻面'
        ]);
        Record::create([
            'id' => 7,
            'user_id' => 3,
            'mission_id' => 3,
            'result' => NULL,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'status' => '未處理',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部拍打'
        ]);
        Record::create([
            'id' => 8,
            'user_id' => 3,
            'mission_id' => 3,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'result' => '{"left":87,"right":174}',
            'status' => '待檢閱',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手部捏握'
        ]);
        Record::create([
            'id' => 9,
            'user_id' => 3,
            'mission_id' => 3,
            'submit_time' => '2022-11-27 18:31:03',
            'location' => '嘉義基督教醫院',
            'result' => '{"left":87,"right":174}',
            'status' => '已檢閱',
            'doctor_comment' => 'Good',
            'created_at' => '2022-11-13 08:00:00',
            
            'category' => '手掌翻面'
        ]);
        Record::create([
            'id' => 10,
            'user_id' => 3,
            'mission_id' => 4,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手部拍打'
        ]);
        Record::create([
            'id' => 11,
            'user_id' => 3,
            'mission_id' => 4,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手部捏握'
        ]);
        Record::create([
            'id' => 12,
            'user_id' => 3,
            'mission_id' => 4,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手掌翻面'
        ]);
        Record::create([
            'id' => 13,
            'user_id' => 5,
            'mission_id' => 5,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手部拍打'
        ]);
        Record::create([
            'id' => 14,
            'user_id' => 5,
            'mission_id' => 5,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手部捏握'
        ]);
        Record::create([
            'id' => 15,
            'user_id' => 5,
            'mission_id' => 5,
            'result' => NULL,
            'status' => '未上傳',
            'doctor_comment' => '',
            'created_at' => '2022-11-13 08:00:00',
            'category' => '手掌翻面'
        ]);
    }
}