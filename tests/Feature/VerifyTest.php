<?php

namespace Tests\Feature;

use App\CustomerUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VerifyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_with_false_code()
    {

        $data = [
            'code'  => '1111111'
        ];

        $response = $this->post('/api/verify', $data);

        $response->assertStatus(406);
        $response->assertJson([
            "status" => 406,
            "message" => "some thing wrong",
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_without_code()
    {

        $data = [];

        $response = $this->post('/api/verify', $data);

        $response->assertStatus(422);
        $response->assertJson([
            "errors" => [
                "code" => [
                    "The code field is required."
                ]
            ]
        ]);
    }
}