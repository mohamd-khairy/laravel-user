<?php

namespace Tests\Feature;

use App\CustomerUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_wishList_with_auth()
    {
        $user = CustomerUser::find(1); // find specific user

        $this->actingAs($user, 'api')
            ->post('/api/wishList?service_id=1')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_wishList_without_auth()
    {
        $this->post('/api/wishList?service_id=1')
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_wishList()
    {
        $user = CustomerUser::find(1); // find specific user

        $response = $this->actingAs($user, 'api')
            ->get('/api/wishList?page_size=10&page=1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "status",
            "message",
            "data" =>  [
                "current_page",
                "data" => [
                    "*" => [
                        "id",
                        "name",
                        "category",
                        "subCategory",
                        "price",
                        "image"
                    ]
                ],
                "first_page_url",
                "from",
                "last_page",
                "last_page_url",
                "next_page_url",
                "path",
                "per_page",
                "prev_page_url",
                "to",
                "total"
            ]
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_service_notadded_to_wishList()
    {
        $user = CustomerUser::find(1); // find specific user

        $response = $this->actingAs($user, 'api')
            ->delete('/api/wishList/1');

        $response->assertStatus(406);

        $response->assertJson([
            "status" => 406,
            "message" => 'some thing wrong !',
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_notfound_wishList()
    {
        $user = CustomerUser::find(1); // find specific user

        $response = $this->actingAs($user, 'api')
            ->delete('/api/wishList/1000');

        $response->assertStatus(406);

        $response->assertJson([
            "status" => 406,
            "message" => "No service with this id !",
        ]);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_found_wishList()
    {
        $user = CustomerUser::find(1); // find specific user

        $this->actingAs($user, 'api')
            ->post('/api/wishList?service_id=1')
            ->assertStatus(200);

        $response = $this->actingAs($user, 'api')
            ->delete('/api/wishList/1');

        $response->assertStatus(200);

        $response->assertJson([
            "status" => 200,
            "message" => "Data removed Successfully"
        ]);
    }
}