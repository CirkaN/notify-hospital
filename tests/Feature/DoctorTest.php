<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Doctor;

use App\User;

class DoctorTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
    public function redirect_if_not_authenticated(){
        $response = $this->get('admin/doctor')->assertRedirect('admin/login');
    }
    /** @test */
    public function create_a_new_doctor(){

        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->post('admin/doctor',[
            'name' => 'Test',
            'surname' => 'User',
            'email' => 'test@user.com',
            'speciality' => 'dermatologist',
            'hospital' => 1,
        ]);
        $this->assertCount(1,Doctor::all());
    }
        /** @test */

    public function can_we_delete_doctor(){
  
        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->post('admin/doctor',[
            'name' => 'Test',
            'surname' => 'User',
            'email' => 'test@user.com',
            'speciality' => 'dermatologist',
            'hospital' => 1,
        ]);
        $response = $this->delete("admin/doctor/".Doctor::first()->id);
        $this->assertCount(0,Doctor::all());
    }
}
