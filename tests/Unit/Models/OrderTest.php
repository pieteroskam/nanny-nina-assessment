<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Check if the orders table has all expected columns.
     *
     * @test
     */
    public function orders_table_has_all_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'id',
                'user_id',
                'product_id',
                'quantity',
                'total',
                'created_at',
                'updated_at'
            ])
        );
    }

    /**
     * Check if the order has belongs to user and product relation.
     *
     * @test
     */
    public function order_belongs_to_user_and_product()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'product_id' => $product->id]);

        $this->assertInstanceOf(User::class, $order->user);
        $this->assertInstanceOf(Product::class, $order->product);
    }
}
