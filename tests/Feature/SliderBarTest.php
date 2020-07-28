<?php

namespace Tests\Feature;

use App\Models\sliderBar;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SliderBarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_slider_bar()
    {

        $Date = date("Y-m-d");

        sliderBar::create([
            "image_en" => 'images/1.png',
            "image_ar" => 'images/1.png',
            "start_date" => date('Y-m-d', strtotime($Date . ' - 1 days')),
            "end_date" => date('Y-m-d', strtotime($Date . ' + 1 days')),
            "title" => 'titile',
            "type" => 'link',
            "link" => 'http://test',
            "navigation" => 'test',
            "active" => 1
        ]);

        $response = $this->get('/api/homepage/slider-bar');

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [[
                    "image",
                    "link"
                ]]
            ]);
    }
}