<?php

namespace Tests\Unit\API\v1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LegislatorsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->json('GET', 'api/v1/legislators');
        $response->assertStatus(200);
        $response->assertJson(['message' => "Unauthenticated."]);
    }
}
