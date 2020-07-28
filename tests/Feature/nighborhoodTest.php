<?php

namespace Tests\Feature;

use App\Models\neighborhood;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class nighborhoodTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_nighborhood()
    {
        neighborhood::create([
            'neighborhood_key' => 'key',
            'neighborhood_en' => 'en',
            'neighborhood_ar' => 'ar',
            'image' => 'image/1.png',
            'show_in_home_page' => 1,
            'active' => 1,
        ]);

        $response = $this->get('/api/homepage/discover_by_city');

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [[
                    "id",
                    "name",
                    "image"
                ]]
            ]);
    }
}