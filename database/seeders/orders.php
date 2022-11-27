<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            ['id'=>1,'name'=>'Nhật Minh','address'=>'Long Biên Hà Nội','phone'=> '0388888888','email'=>'nhatminh2018@gmail.com','note'=>'Ship giờ hành chính','product'=>'Giỏ Hoa Hướng Dương x 2;Bó Hoa Sinh Nhật Đẹp Tặng Bạn x 2','price'=>'1,800,000 đ','status'=>0],
            ['id'=>2,'name'=>'Huy Hoàng','address'=>'Việt Yên Bắc Giang','phone'=> '0366666666','email'=>'huyhoang2022@gmail.com','note'=>'Ship ngày mai','product'=>'Giỏ Hoa Hồng Đỏ Đẹp x 1;Bó Hoa Mẫu Đơn Đẹp x 2','price'=>'1,400,000 đ','status'=>0],
        ]);
    }
}
