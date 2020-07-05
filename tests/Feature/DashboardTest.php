<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
            /** @test */

    public function redirect_if_not_authenticated(){
        $response = $this->get('admin/dashboard')->assertRedirect('admin/login');
    }
        /** @test */

    public function redirect_if_not_admin(){
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('admin/dashboard')->assertRedirect('/admin/login');
    }
}
