<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GameTableTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test that the games table has an ID and code columns.
     */
    public function test_games_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('games', [
                'id', 'code'
            ])
        );
    }
}
