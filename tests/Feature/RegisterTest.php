<?php

namespace Tests\Feature;

use App\CustomerUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'first_name' => "mohamed",
            'middle_name' => "abdelsalam",
            'last_name' => "khairy",
            'date_of_birth' => "1991/12/15",
            'email' => "m.khairy1@evntoo.com",
            'password' => '$AhmedArafa2020',
            'c_password' => '$AhmedArafa2020',
            'gender' => 'male',
            'personal_phone' => '01021329593'
        ];
        $response = $this->post('/api/register', $data);

        $response->assertStatus(200)
            ->assertJson([
                "status" => 200,
                "message" => "Verifiy your new email",
                "data" => [
                    "id" => 2
                ]
            ]);
    }
}