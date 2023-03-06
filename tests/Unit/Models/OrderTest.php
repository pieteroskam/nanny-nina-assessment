<?php

namespace Tests\Unit\Models;

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
}
