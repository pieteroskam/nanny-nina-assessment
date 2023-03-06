<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Check if the products table has all expected columns.
     *
     * @test
     */
    public function products_table_has_all_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id',
                'category',
                'title',
                'vendor',
                'price',
                'rating',
                'created_at',
                'updated_at'
            ])
        );
    }
}
