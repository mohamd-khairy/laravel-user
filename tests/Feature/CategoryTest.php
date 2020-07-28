<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category()
    {
        $response = $this->get('/api/homePage/category-subcategory', [
            "language" => 'en'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [
                    "Places" => [
                        [
                            "id",
                            "name",
                            "image"
                        ]
                    ],
                    "Food & Beverages" => [
                        [
                            "id",
                            "name",
                            "image"
                        ]
                    ]
                ]
            ]);
    }
}