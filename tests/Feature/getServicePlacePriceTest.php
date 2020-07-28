<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getServicePlacePriceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_service_place_price()
    {
        $response = $this->get('/api/service_price?service_id=200&date=' . date('Y-m-d'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "price_per_day",
                "price_per_morning",
                "price_per_evening",
                "min_price",
                "old_prices" => [
                    "price_per_day",
                    "price_per_morning",
                    "price_per_evening",
                    "min_price"
                ],
                "offer"
            ]
        ]);
    }
}