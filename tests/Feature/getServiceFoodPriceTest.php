<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getServiceFoodPriceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_service_food_price()
    {
        $response = $this->get('/api/service_price?service_id=1&date=' . date('Y-m-d'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "price_per_item",
                "old_prices" => [
                    "price_per_item"
                ],
                "offer"
            ]
        ]);
    }
}