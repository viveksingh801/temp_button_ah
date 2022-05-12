<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * Auth test.
     * User is able to login if 200
     * @return void
     */
    public function test_login_feature()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/login', [
            'email'  =>  'test@example.com',
            'password'  => 'Test@123',
        ]);

        $response->assertStatus(200);

        $this->assertArrayHasKey('access_token',$response->json());
    }

    
    /**
     * Get data test.
     * User gets data only if they have a valid token
     * @return void
     */
    public function test_user_does_gets_the_data_with_token()
    {

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/login', [
            'email'  =>  'test@example.com',
            'password'  => 'Test@123',
        ]);

        $response->assertStatus(200);

        $res = json_decode($response->getContent());

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $res->access_token
        ])->get('/api/users');

        $response->assertStatus(200);
    }

    /**
     * Doesn't get data test.
     * User doesn't gets data only if they have a invalid token
     * @return void
     */
    public function test_user_does_not_gets_the_data_without_token()
    {

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('/api/login', [
            'email'  =>  'test@example.com',
            'password'  => 'Test@1232134',
        ]);

        $response->assertStatus(400);

        $response = $this->withHeaders([
            'Authorization' => \Str::random(20)
        ])->get('/api/users');

        $response->assertStatus(401);
    }

    


}
