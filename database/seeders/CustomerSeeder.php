<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void last_name
     */
    public function run()
    {
        DB::table('customers')->insert([
            'code'=>2001000001,
        	'first_name'=>'Radom Customer',

        ]);

    }
}
