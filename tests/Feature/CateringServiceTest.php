<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CateringServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_catering_service()
    {
        $response = $this->get('/api/homePage/catering-services');

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "message",
                "data" => [
                    "Restaurants" => [
                        "*" => [
                            "id",
                            "name",
                            "subCategory",
                            "max_num_order",
                            "price",
                            "package",
                            "offer",
                            "image"
                        ]
                    ],
                    "Catering Catering" => [],
                    "Cooks" => [],
                    "drinks" => [],
                    "Candy" => []
                ]
            ]);
    }
}