<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Product::truncate();

        $users = User::factory()->count(10)->create();

        $users->each(function ($user) {
            $products = Product::factory()->count(rand(200000, 500000))
                ->make(['user_id' => $user->id]);

            $chunks = $products->chunk(2000);

            $chunks->each(function ($chunk) {
                Product::insert($chunk->toArray());
            });
        });

    }
}
