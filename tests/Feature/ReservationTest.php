<?php

namespace Tests\Feature;

use App\CustomerUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_reservation()
    {
        $user = CustomerUser::find(1); // find specific user

        $data = [
            'service_id' => 1,
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 2
        ];

        $response = $this->actingAs($user, 'api')->post('/api/reservation/service', $data);

        $response->assertStatus(200);

        $response->assertJson([
            "status" => 200,
            "message" => "Data saved Successfully",
            "data" => [
                "service_id" => 1,
                "reservation_date" => date('Y-m-d'),
                "price_slot" => null,
                "quantity" => 2,
                "id" => 1
            ]
        ]);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_remove_reservation()
    {
        $user = CustomerUser::find(1); // find specific user

        $data = [
            'service_id' => 1,
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 2
        ];

        $response = $this->actingAs($user, 'api')->post('/api/reservation/service', $data);

        $response = $this->actingAs($user, 'api')->delete('/api/reservation/remove/1');

        $response->assertStatus(200);

        $response->assertJson([
            "status" => 200,
            "message" => "data removed Successfully",
            "data" => []
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_reservation_list()
    {
        $user = CustomerUser::find(1); // find specific user
        $data = [
            'service_id' => 1,
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 2
        ];

        $response = $this->actingAs($user, 'api')->post('/api/reservation/service', $data);
        $response = $this->actingAs($user, 'api')->get('/api/reservations');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "reservations" => [
                    "*" => [
                        "reservation_id",
                        "reservation_date",
                        "service_status",
                        "service_id",
                        "service_name",
                        "provider_name",
                        "service_image",
                        "service_addons" => [
                            "*" => [
                                "id",
                                "quantity",
                                "name",
                                "image",
                                "price",
                                "price_type"
                            ]
                        ],
                        "service_quantity",
                        "service_offer",
                        "service_old_price",
                        "service_price",
                        "service_addons_total_price",
                        "service_total"
                    ]
                ],
                "subTotal",
                "shippingAmount",
                "total"
            ]
        ]);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_reservation()
    {
        $user = CustomerUser::find(1); // find specific user

        $data_add = [
            'service_id' => 1,
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 2
        ];
        $response = $this->actingAs($user, 'api')->post('/api/reservation/service', $data_add);

        $data_update = [
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 20
        ];
        $response = $this->actingAs($user, 'api')->put('/api/reservation/update/1', $data_update);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" => [
                "reservations" => [
                    "*" => [
                        "reservation_id",
                        "reservation_date",
                        "service_status",
                        "service_id",
                        "service_name",
                        "provider_name",
                        "service_image",
                        "service_addons" => [
                            "*" => [
                                "id",
                                "quantity",
                                "name",
                                "image",
                                "price",
                                "price_type"
                            ]
                        ],
                        "service_quantity",
                        "service_offer",
                        "service_old_price",
                        "service_price",
                        "service_addons_total_price",
                        "service_total"
                    ]
                ],
                "subTotal",
                "shippingAmount",
                "total"
            ]
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_remove_addons_reservation()
    {
        $user = CustomerUser::find(1); // find specific user

        $data = [
            'service_id' => 1,
            'reservation_date' => date('Y-m-d'),
            'price_slot' => 'day',
            'quantity' => 2
        ];

        $response = $this->actingAs($user, 'api')->post('/api/reservation/service', $data);

        $data = [
            'addons_id' => 1,
            'reservation_id' => 1
        ];

        $response = $this->actingAs($user, 'api')->delete('/api/reservation/remove_addons', $data);

        $response->assertStatus(406);

        $response->assertJson([
            "status" => 406,
            "message" => "there is no addons with this id for this reservation  !"
        ]);
    }
}