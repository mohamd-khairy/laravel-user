<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getServicePlaceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_service_place()
    {
        $response = $this->get('/api/service/200');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "service_id",
                "images" => [],
                "service_name",
                "category_name",
                "subCategory_name",
                "fitsWith" => [
                    "*" => [
                        "name"
                    ]
                ],
                "setup" => [],
                "provider" => [
                    "id",
                    "brand_name",
                    "logo"
                ],
                "floor_plane",
                "min_capacity",
                "max_capacity",
                "min_price",
                "description",
                "addons" => [
                    "*" => [
                        "id",
                        "name",
                        "description",
                        "price",
                        "price_type",
                        "image"
                    ]
                ],
                "min_deposit",
                "facilities_indoor" => [
                    "*" => [
                        "id",
                        "name",
                        "checked"
                    ]
                ],
                "facilities_outdoor" => [
                    "*" => [
                        "id",
                        "name",
                        "checked"
                    ]
                ],
                "address" => [
                    "lat",
                    "lng",
                    "address"
                ],
                "terms_and_condition",
                "cancellation" => [
                    "cancel_free",
                    "cancel_fees"
                ],
                "packages" => [
                    "*" => [
                        "id",
                        "name",
                        "description",
                        "price",
                        "image"
                    ]
                ]
            ]

        ]);
    }
}