<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_user_can_access_to_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    
}
