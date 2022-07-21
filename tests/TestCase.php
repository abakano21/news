<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    public function setUp(): void
    {
        parent::setUp();
        // Given data
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);
    }
}
