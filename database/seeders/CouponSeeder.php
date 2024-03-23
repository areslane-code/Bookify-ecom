<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $discountCodes = [
            ['code' => 'CODE10', 'percentage' => 10.0, 'expires_at' => '2024-04-30'],
            ['code' => 'SPRING20', 'percentage' => 20.0, 'expires_at' => '2024-05-31'],
            ['code' => 'SUMMER30', 'percentage' => 30.0, 'expires_at' => '2024-06-30'],
            ['code' => 'FALL40', 'percentage' => 40.0, 'expires_at' => '2024-09-30'],
            ['code' => 'WINTER50', 'percentage' => 50.0, 'expires_at' => '2024-12-31'],
            ['code' => 'SPECIAL25', 'percentage' => 25.0, 'expires_at' => '2024-07-31'],
            ['code' => 'NEWYEAR15', 'percentage' => 15.0, 'expires_at' => '2025-01-31'],
            ['code' => 'BACKTOSCHOOL20', 'percentage' => 20.0, 'expires_at' => '2024-08-31'],
            ['code' => 'HOLIDAY60', 'percentage' => 60.0, 'expires_at' => '2024-12-25'],
            ['code' => 'CLEARANCE75', 'percentage' => 75.0, 'expires_at' => '2024-07-15']
        ];

        foreach ($discountCodes as $code) {
            DB::table('coupons')->insert($code);
        }
        //
    }
}
