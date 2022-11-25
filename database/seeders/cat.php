<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat')->insert([
            ['id'=>1,'name'=>'Bó Hoa Đẹp','cat_alias'=>'bo-hoa-dep','status'=>1],
            ['id'=>2,'name'=>'Giỏ Hoa Đẹp','cat_alias'=>'gio-hoa-dep','status'=>1],
            ['id'=>3,'name'=>'Hoa Chia Buồn','cat_alias'=>'hoa-chia-buon','status'=>1],
            ['id'=>4,'name'=>'Hoa Sáp','cat_alias'=>'hoa-sap','status'=>1],
            ['id'=>5,'name'=>'Hoa Chúc Mừng Khai Trương','cat_alias'=>'hoa-chuc-mung-khai-truong','status'=>1]
        ]);

    }
}
