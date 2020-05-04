<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use  Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            'name'=>'MəhəmmədƏli İsmayilov',
            'email'=>'mahammadaliismayilov22@gmail.com',
             'password'=>bcrypt('mahisma00')
        ]);
    }
}
