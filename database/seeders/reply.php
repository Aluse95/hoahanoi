<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reply extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reply')->insert([
            ['id'=>1,'user_id'=>'1','comment_id'=>1,'content'=>'Cảm ơn bạn'],
            ['id'=>2,'user_id'=>'1','comment_id'=>2,'content'=>'check ib bạn nhé']
        ]);
    }
}
