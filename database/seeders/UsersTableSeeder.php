<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fred Chao',
                'email' => 'fredchao0618@alum.ccu.edu.tw',
                'gender' => 'male',
                'birthday' => '2001-06-18',
                'personal_id' => 'S125516201',
                'phone' => '0905276661',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ayS3uzAevM.qx14ECPx2mehnfNC7ZUmVAZ8qr4mvguECAS2Gi6q7G',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'doctor_id' => 3,
                'remember_token' => NULL,
                'created_at' => '2022-11-12 10:20:36',
                'updated_at' => '2022-11-12 10:20:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Fred Chao',
                'email' => 'fredchao0618@alum.ccu.edu.tw.test',
                'gender' => 'male',
                'birthday' => '2001-06-18',
                'personal_id' => 'S125516202',
                'phone' => '0905276661',
                'email_verified_at' => NULL,
                'password' => '$2y$10$IpzmHoQ2SGecMW1kTv716uSDMd2Ce3tSYq.lLlI2qVcBPJGvE/oUi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'doctor_id' => 3,
                'remember_token' => NULL,
                'created_at' => '2022-11-13 16:11:56',
                'updated_at' => '2022-11-13 16:11:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Fred Chao',
                'email' => 'fredchao0618@alum.ccu.edu.tw.test2',
                'gender' => 'male',
                'birthday' => '2001-06-18',
                'personal_id' => 'S125516203',
                'phone' => '0905276661',
                'email_verified_at' => NULL,
                'password' => '$2y$10$drJThHIz5ctnMXGx/j8DFemZlN1OinTRbHtY/1fzBSe.A9GmwmSIS',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'doctor_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2022-11-15 03:22:42',
                'updated_at' => '2022-11-15 03:22:42',
            ),
        ));
        
        
    }
}