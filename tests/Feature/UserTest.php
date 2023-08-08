<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_route_user()
    {
        $this->get('/login')->assertStatus(200);
    }
    public function test_create_user_by_factory()
    {
        $user = User::factory(User::class)->create(); //goi factory de tao moi du lieu
        $this->assertNotNull($user); //kiem tra ket qua tra ve co NULL hay khong
    }
}
