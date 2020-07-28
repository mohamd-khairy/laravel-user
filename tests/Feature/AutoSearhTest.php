<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutoSearhTest extends TestCase
{
    /** @test */
    public function test_with_all_params()
    {
        $response = $this->get("/api/auto/search?category=1&text='o'&page_size=5");
        
        $response->assertOk(); 

    }

    /** @test */
    public function test_without_params()
    {
        $response = $this->get('/api/auto/search?text=o&page_size=5');

        $response->assertStatus(422);
        
    }
}
