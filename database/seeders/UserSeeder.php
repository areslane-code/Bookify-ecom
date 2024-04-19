<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastname' => "abdmeziem",
            'firstname' => "areslane",
            'email' => 'areslane@gmail.com',
            'password' => Hash::make('password'),
            'role' => 2,
            'phoneNumber' => 23232,
        ]);

        $start = strtotime('2024-01-01 00:00:00'); // Start timestamp (January 1, 2023, 00:00:00)
        $end = strtotime('2024-12-31 23:59:59'); // End timestamp (December 31, 2023, 23:59:59)



        for ($i = 0; $i < 30; $i++) {
            $randomTimestamp = mt_rand($start, $end);
            $randomStamp = date('Y-m-d H:i:s', $randomTimestamp);
            DB::table('users')->insert([
                'lastname' => 'lastname',
                'firstname' => 'firstname',
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'),
                'role' => 0,
                'phoneNumber' => "0435435543",
                "created_at" =>   $randomStamp,
            ]);
        }
    }
}
