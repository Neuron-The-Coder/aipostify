<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Jokowo",
            "email" => "jokowo@mail.com",
            "phone" => "0123 4567 8901",
            "company" => "Jokowo & Mug Jaman Old",
            "password" => bcrypt("helloWORLD")
        ]);
    }
}
