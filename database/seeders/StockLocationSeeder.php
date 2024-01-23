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
        //---------------All Focus----------------------//

        // DB::table('stock_locations')->insert([
        //     'code'=>21510000001,
        // 	'name'=>'Workshop',
        // 	'is_active'=>1
        // ]);

        //-----------------ISITHA CLIENT---------------//
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000001,
        // 	'name'=>'Workshop',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000001,
        // 	'name'=>'Branch 1',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000002,
        // 	'name'=>'Branch 2',
        // 	'is_active'=>1
        // ]);
        // DB::table('stock_locations')->insert([
        //     'code'=>21510000003,
        // 	'name'=>'Branch 3',
        // 	'is_active'=>1
        // ]);

//--------------Lace Emporium----------------------------//

   DB::table('stock_locations')->insert([
            'code'=>21510000001,
        	'name'=>'Star',
        	'is_active'=>1
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000002,
        	'name'=>'Main ',
        	'is_active'=>1
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000003,
        	'name'=>'Bank',
        	'is_active'=>1
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000004,
        	'name'=>'Nizamiya',
        	'is_active'=>1
        ]);
        DB::table('stock_locations')->insert([
            'code'=>21510000005,
        	'name'=>'Shop',
        	'is_active'=>1
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
