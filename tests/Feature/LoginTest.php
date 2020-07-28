<?php

namespace Tests\Feature;

use App\CustomerUser;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_no_user()
    {

        $data = [
            'email' => "m.khairy@evntoo.com",
            'password' => "password",
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(406);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_user_but_not_verified()
    {
        factory(CustomerUser::class)->create(['personal_phone' => '01021952161', 'email' => 'm.khairy@evntoo.com', 'email_verified_at' => null]);

        $data = [
            'email' => "m.khairy@evntoo.com",
            'password' => "password",
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(406)
            ->assertJson([
                "status" => 406,
                "message" => "Sorry , this email not verified !",
                "data" => []
            ]);
    }

    public function test_login_with_user_verified()
    {

        $data = [
            'email' => "evntoo@evntoo.com",
            'password' => 'password',
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            "status",
            "data" => [
                "token",
                "default_lang",
                "email_verified_at"
            ]
        ]);
    }
}