<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   DB::table('stock_locations')->insert([
            'code'=>21510000001,
        	'name'=>'Kalmunai'
        	
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000002,
        	'name'=>'baticalo',
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000003,
        	'name'=>'Trinco',
        	
        ]);
      

        // DB::table('stock_locations')->insert([
        //     'code'=>21510000004,
        // 	'name'=>'Store',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000005,
        // 	'name'=>'Oil Mart',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000002,
        // 	'name'=>'Mill',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000004,
        // 	'name'=>'KOT',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000005,
        // 	'name'=>'BOT',
        // 	'is_active'=>1
        // ]);

    }
}
