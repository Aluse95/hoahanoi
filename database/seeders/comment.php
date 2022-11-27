<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            ['id'=>1,'user_id'=>'2','news_id'=>2,'content'=>'Hay quá'],
            ['id'=>2,'user_id'=>'3','news_id'=>3,'content'=>'Xin giá hoa loa kèn ?']
        ]);
    }
}
