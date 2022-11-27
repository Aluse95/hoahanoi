<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>1,'name'=>'Nhật Minh','email'=>'nhatminh2018@gmail.com','password'=>'$2y$10$wLpvkQ8TgkrDUvWbpoDtxeMNvB78.i/YaoPpM6oV3Vv/EpKL4YDWy',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdMLrslmZvTKzGlkE8pVVFE9UaOFhMffomQ&usqp=CAU','level'=>1],
            ['id'=>2,'name'=>'Huy Hoàng','email'=>'huyhoang2022@gmail.com','password'=>'$2y$10$wLpvkQ8TgkrDUvWbpoDtxeMNvB78.i/YaoPpM6oV3Vv/EpKL4YDWy',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwTMzlG4pcUt9UZ_5G1xo5Pf4raNAUqXPwzg&usqp=CAU','level'=>0],
            ['id'=>3,'name'=>'Hà Phương','email'=>'haphuong2018@gmail.com','password'=>'$2y$10$wLpvkQ8TgkrDUvWbpoDtxeMNvB78.i/YaoPpM6oV3Vv/EpKL4YDWy',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwTMzlG4pcUt9UZ_5G1xo5Pf4raNAUqXPwzg&usqp=CAU','level'=>0],

        ]);
    }
}
