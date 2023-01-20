<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'administrator@crud.com',
            'type_user' => 'Administrador',
            'password' => '$2y$10$qLzqTOG4tdfFJwhpd2VJWOxVsaN56vr5Oo7gh7G03NXqiY/.bXLwi',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
