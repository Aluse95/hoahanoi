<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(cat::class);
        $this->call(news::class);
        $this->call(users::class);
        $this->call(reply::class);
        $this->call(orders::class);
        $this->call(comment::class);
        $this->call(product::class);
        $this->call(discount::class);
        $this->call(product_user::class);
    }
}
