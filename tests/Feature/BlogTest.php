<?php

namespace Tests\Feature;

use App\Models\blogs;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_blogs()
    {
        $response = $this->get('/api/homepage/blogs');

        $response->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [
                    [
                        "title",
                        "image",
                        "link",
                        "blog_date"
                    ]
                ]
            ]);
    }
}