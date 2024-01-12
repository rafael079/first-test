<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_can_access_registration_page(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register(): void
    {
        $data = [
            'name' => fake()->name,
            'email' => fake()->unique()->email()
        ];

        $response = $this->post('/api/v1/register', [
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => "password",
            "password_confirmation" => "password"
        ]);

        $result = json_decode($response->getContent());

        $response->assertStatus(200);

        $this->assertTrue($result->success);
        $this->assertSame($result->data->name, $data['name']);
        $this->assertSame($result->data->email, $data['email']);

    }
}
