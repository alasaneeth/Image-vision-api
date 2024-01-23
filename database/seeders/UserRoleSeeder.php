<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'user_id' => '1',
            'name' => "admin",
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '2',
            'name' => "admin",
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '3',
            'name' => "manager",
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '4',
            'name' => "cashier",
        ]);
        DB::table('user_roles')->insert([
            'user_id' => '5',
            'name' => "superAdmin",
        ]);
    }
}