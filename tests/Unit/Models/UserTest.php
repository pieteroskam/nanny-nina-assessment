<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Check if the users table has all expected columns.
     *
     * @test
     */
    public function users_table_has_all_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'name',
                'email',
                'email_verified_at',
                'password',
                'age',
                'country',
                'city',
                'relationship',
                'remember_token',
                'created_at',
                'updated_at'
            ])
        );
    }
}
