<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'username' => "admin",
            'address' => 'Kalmunai',
            'password' => '$2a$12$3fHgxuB2BNJW2gN8iwCnpOGrj2Kw3L5d1EVlzQXiZAExF9jM54bTa', // password
        ]);
        
        DB::table('users')->insert([
            'username' => "cashier",
            'address' => 'Kalmunai',
            'password' => '$2a$12$3fHgxuB2BNJW2gN8iwCnpOGrj2Kw3L5d1EVlzQXiZAExF9jM54bTa', // password
        ]);
    }
}
