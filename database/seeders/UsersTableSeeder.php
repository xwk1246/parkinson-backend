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
            'name' => 'Doctor 1',
            'email' => 'doctor1@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'A123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$ayS3uzAevM.qx14ECPx2mehnfNC7ZUmVAZ8qr4mvguECAS2Gi6q7G',
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
            'doctor_id' => 1,
            'remember_token' => NULL,
            'created_at' => '2022-11-15 03:22:42',
            'updated_at' => '2022-11-15 03:22:42',
        ])->assignRole('patient');
        User::create([
            'id' => 4,
            'name' => 'Doctor 2',
            'email' => 'doctor2@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'D123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$ayS3uzAevM.qx14ECPx2mehnfNC7ZUmVAZ8qr4mvguECAS2Gi6q7G',
            'doctor_id' => NULL,
            'remember_token' => NULL,
            'created_at' => '2022-11-12 10:20:36',
            'updated_at' => '2022-11-12 10:20:36',
        ])->assignRole('doctor');
        User::create([
            'id' => 5,
            'name' => 'Patient 3',
            'email' => 'patient3@parkinson.com.tw',
            'gender' => 'male',
            'birthday' => '2000-01-01',
            'personal_id' => 'E123456789',
            'phone' => '0987654321',
            'email_verified_at' => NULL,
            'password' => '$2y$10$drJThHIz5ctnMXGx/j8DFemZlN1OinTRbHtY/1fzBSe.A9GmwmSIS',
            'doctor_id' => 4,
            'remember_token' => NULL,
            'created_at' => '2022-11-15 03:22:42',
            'updated_at' => '2022-11-15 03:22:42',
        ])->assignRole('patient');
        
    }
}
