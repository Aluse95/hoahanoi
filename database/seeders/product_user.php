<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class product_user extends Seeder
{
    
    public function run()
    {
        DB::table('product_user')->insert([
            ['id'=>1,'user_id'=>'2','product_id'=>8,'quantity'=>2],
            ['id'=>2,'user_id'=>'2','product_id'=>2,'quantity'=>1],
            ['id'=>3,'user_id'=>'3','product_id'=>10,'quantity'=>1],
            ['id'=>4,'user_id'=>'3','product_id'=>20,'quantity'=>3]
        ]);
    }
}
