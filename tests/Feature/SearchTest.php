<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function test_without_params()
    {
        $response = $this->get('/api/search?text=M&page=1&page_size=10');

        $response->assertStatus(422); 
    }
}
