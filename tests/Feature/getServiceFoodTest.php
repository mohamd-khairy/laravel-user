<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getServiceFoodTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_service_food()
    {
        $response = $this->get('/api/service/1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "service_id",
                "images",
                "service_name",
                "category_name",
                "subCategory_name",
                "fitsWith" => [
                    "*" => [
                        "name"
                    ]
                ],
                "provider" => [
                    "id",
                    "brand_name",
                    "logo"
                ],
                "provider_address",
                "min_order_amount",
                "max_num_order_day",
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
                "food_type" => [
                    "*" => [
                        "id",
                        "name"
                    ]
                ],
                "ingredient",
                "group_orders",
                "coverage" => [
                    "districts"
                ],
                "serving_option",
                "prepration_time",
                "delivery_time",
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
                ],
                "price_per_item"
            ]

        ]);
    }
}