<?php

namespace Tests\Feature;

use App\Models\Nav_bar;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class navBarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_navbar()
    {
        $response = $this->get('/api/homepage/nav-bar', [
            'language' => 'ar'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [[
                    "id",
                    "name",
                    "link"
                ]]
            ]);
    }


    public function test_navbar_change_lang()
    {

        $response = $this->get('/api/homepage/nav-bar', [
            'language' => 'en'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [[
                    "id",
                    "name",
                    "link"
                ]]
            ]);
    }
}