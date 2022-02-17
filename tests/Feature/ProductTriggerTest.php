<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTriggerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_trigger_update_sum_field()
    {
        $user = User::factory()->create();

        $productFactory = Product::factory()
            ->create(['user_id' => $user->id]);

        $productDb = Product::find($productFactory['id']);

        $sumFactory = $productFactory['price'] * $productFactory['count'];
        $sumDb = (float) $productDb['sum'];

        $this->assertEquals($sumFactory, $sumDb);
    }
}
