<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventusBannarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_events()
    {

        $response = $this->get('/api/homepage/events');

        $response->assertStatus(200)
            ->assertJson([
                "status" => 200,
                "data" => [
                    [
                        "id" => 1,
                        "name" => "Organizational Events",
                        "image" => NULL,
                        "position" => "1"
                    ],
                    [
                        "id" => 2,
                        "name" => "Cultural Events",
                        "image" => NULL,
                        "position" => "2"
                    ],
                    [
                        "id" => 3,
                        "name" => "Leisure Events",
                        "image" => NULL,
                        "position" => "3"
                    ],
                    [
                        "id" => 4,
                        "name" => "Personal Events",
                        "image" => NULL,
                        "position" => "4"
                    ]
                ]
            ]);
    }
}