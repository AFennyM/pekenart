<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }
    public function test_add_new_users()
    {
        $response = $this->post('register', [
            'name' => 'Lavend',
            'email' => 'lavend@gmail.com',
            'password' => 'lavend123'
        ]);

        $response->assertRedirect('/');
    }
    public function test_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'user1'
        ]);
    }
    public function test_database_missing()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'userbaru'
        ]);
    }
    public function test_if_seeders_works()
    {
        $this->seed();
    }
}
