<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'id' => 1,
            'name' => 'Doctor',
            'email' => 'doctor@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'A123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$ayS3uzAevM.qx14ECPx2mehnfNC7ZUmVAZ8qr4mvguECAS2Gi6q7G',
            'two_factor_secret' => NULL,
            'two_factor_recovery_codes' => NULL,
            'doctor_id' => NULL,
            'remember_token' => NULL,
            'created_at' => '2022-11-12 10:20:36',
            'updated_at' => '2022-11-12 10:20:36',
        ])->assignRole('doctor');

        User::create([
            'id' => 2,
            'name' => 'Patient 1',
            'email' => 'patient1@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'B123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$IpzmHoQ2SGecMW1kTv716uSDMd2Ce3tSYq.lLlI2qVcBPJGvE/oUi',
            'two_factor_secret' => NULL,
            'two_factor_recovery_codes' => NULL,
            'doctor_id' => 1,
            'remember_token' => NULL,
            'created_at' => '2022-11-13 16:11:56',
            'updated_at' => '2022-11-13 16:11:56',
        ])->assignRole('patient');

        User::create([
            'id' => 3,
            'name' => 'Patient 2',
            'email' => 'patient2@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'C123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$drJThHIz5ctnMXGx/j8DFemZlN1OinTRbHtY/1fzBSe.A9GmwmSIS',
            'two_factor_secret' => NULL,
            'two_factor_recovery_codes' => NULL,
            'doctor_id' => 1,
            'remember_token' => NULL,
            'created_at' => '2022-11-15 03:22:42',
            'updated_at' => '2022-11-15 03:22:42',
        ])->assignRole('patient');
        
    }
}