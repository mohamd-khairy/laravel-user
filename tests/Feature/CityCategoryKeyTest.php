<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityCategoryKeyTest extends TestCase
{
    public function test_success()
    {
        $response = $this->get('/api/cities-categories');

        $response->assertStatus(200)
        ->assertJsonStructure([
            "status",
            "data" => [
                "categories" => [
                    [
                        "id",
                        "name",
                        "translations"
                    ]
                ],
                "cities" => []
            ]
        ]);
    }
}
