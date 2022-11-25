<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class discount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert([
            ['id'=>1,'name'=>'GPMN1975','sale_off'=> 0.1,'status'=>1],
            ['id'=>2,'name'=>'PXHN2022','sale_off'=> 0.3,'status'=>1],
            ['id'=>3,'name'=>'VINE9999','sale_off'=> 0.4,'status'=>1],
            ['id'=>4,'name'=>'BHPX3333','sale_off'=> 0.2,'status'=>1]
        ]);
    }
}
