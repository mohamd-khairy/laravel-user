<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VenueServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_venue_service()
    {
        $response = $this->get('/api/homePage/venue-services');

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "message",
                "data" => [
                    "Hotels" => [
                        "*" => [
                            "id",
                            "name",
                            "price",
                            "max_capacity",
                            "package",
                            "offer",
                            "image",
                            "neighborhood"
                        ]
                    ],
                    "Conferences and Exhibitions" => [],
                    "Event Halls" => [],
                    "Theaters" => [],
                    "Breaks" => [],
                    "Palaces and villas" => [],
                    "Religious halls" => [],
                    "Meeting rooms" => [],
                    "Entertainment halls" => [],
                    "Educational halls" => []
                ]
            ]);
    }
}