<?php

namespace Tests\Feature;

use App\CustomerUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_customer_data()
    {
        $user = CustomerUser::find(1); // find specific user

        $data = [
            'gender' => 'male',
            'job_title' => 'test',
            'first_name' => 'test',
            'middle_name' => 'test',
            'last_name' => 'test',
            'date_of_birth' => '1994-3-13',
            'personal_phone' => '12345678912'
        ];

        $response = $this->actingAs($user, 'api')->post('/api/CustomerData' , $data);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status" ,
            "message" ,
            "data"
        ]);
    }
}
