<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *        
     * @return void
     */
    public function test_get_event_without_params_api()
    {
        $response = $this->get('/api/events');

        $response->assertStatus(422);

        $response->assertJson([
            "errors" => [
                "fits_with_id" => [
                    "The fits with id field is required."
                ]
            ]
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_event_with_invalid_fits_with_id_params_api()
    {
        $response = $this->get('/api/events?fits_with_id=10');

        $response->assertStatus(422);

        $response->assertJson([
            "errors" => [
                "fits_with_id" => [
                    "The selected fits with id is invalid."
                ]
            ]
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_filter_event_api()
    {
        $response = $this->get('/api/events/filter?category=7');

        $response->assertStatus(422);

        $response->assertJson([
            "errors" => [
                "category" => [
                    "The selected category is invalid."
                ]
            ]
        ]);
    }
}