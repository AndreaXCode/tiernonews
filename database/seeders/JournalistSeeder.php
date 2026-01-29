<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("journalists")->insert([
            "name" => "Luz",
            "surname" => "Luna",
            "email" => "luz@a.com",
            "password" => "",
        ]);

        

        for ($i = 0; $i < 5; $i++) {
            DB::table("journalists")->insert([
                "name" => "journalist$i",
                "surname" => "surname$i",
                "email" => "email$i@a.com",
                "password" => "",
            ]);
        }
    }
}