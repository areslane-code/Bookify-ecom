<?php

namespace Database\Seeders;

use App\Models\User;
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
        $now = now();


        DB::table('users')->insert([
            'lastname' => "abdmeziem",
            'firstname' => "areslane",
            'email' => 'areslane@gmail.com',
            'password' => Hash::make('password'),
            'role' => 2,
            'phoneNumber' => 23232,
            "created_at" => $now, "updated_at" => $now,
        ]);

        User::factory()->count(60)->create();

        for ($i = 0; $i < 30; $i++) {

            DB::table('users')->insert([
                'lastname' => 'lastname',
                'firstname' => 'firstname',
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'),
                'role' => 0,
                'phoneNumber' => "0435435543",
                "created_at" => $now, "updated_at" => $now,
            ]);
        }
    }
}
