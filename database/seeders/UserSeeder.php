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
            'username' => "suhail",
            'address' => 'Kalmunai',
            'password' => '$2a$10$MHNgTjZQbwnIw.YaR2Om9.pFbES24dH5KDjPPbUINhbWWhz2nEUS2', // TitumAt001
        ]);

        DB::table('users')->insert([
            'username' => "manager",
            'address' => 'Kalmunai',
            'password' => '$2a$12$3fHgxuB2BNJW2gN8iwCnpOGrj2Kw3L5d1EVlzQXiZAExF9jM54bTa', // password
        ]);

        DB::table('users')->insert([
            'username' => "cashier",
            'address' => 'Kalmunai',
            'password' => '$2a$12$3fHgxuB2BNJW2gN8iwCnpOGrj2Kw3L5d1EVlzQXiZAExF9jM54bTa', // password
        ]);
        DB::table('users')->insert([
            'username' => "amrish",
            'address' => 'Kalmunai',
            'password' => '$2a$12$3fHgxuB2BNJW2gN8iwCnpOGrj2Kw3L5d1EVlzQXiZAExF9jM54bTa', // password
        ]);
    }
}
