<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Hospital;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class HospitalTest extends TestCase
{
    use RefreshDatabase;
   /** @test */

    public function redirect_if_not_authenticated(){
        $response = $this->get('admin/hospital')->assertRedirect('admin/login');
    }
    /** @test */
    public function admin_can_access_to_hospital(){
        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->get('admin/hospital')->assertOk();
    }
        /** @test */

    public function redirect_anyone_but_admin(){
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('admin/hospital')->assertRedirect('/admin/login');
    }
        /** @test */
    public function create_a_new_hospital(){
        Storage::fake('image');

        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->post('admin/hospital',[
            'hospital_image' => UploadedFile::fake()->image('image.jpg'),
            'hospital_name' => 'Test Hospital',
            'hospital_serial' => 852545, 
        ]);
        $this->assertCount(1,Hospital::all());
    }
            /** @test */

    public function can_wee_see_hospital(){
        Storage::fake('image');

        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->post('admin/hospital',[
            'hospital_image' => UploadedFile::fake()->image('image.jpg'),
            'hospital_name' => 'Test Hospital',
            'hospital_serial' => 852545, 
        ]);

        $response = $this->get("admin/dashboard/manage/".Hospital::first()->uuid)
        ->assertOk();
    }
    /** @test */
    public function can_we_delete_hospital(){
        Storage::fake('image');

        $this->actingAs(factory(User::class)->create(),'admin');
        $response = $this->post('admin/hospital',[
            'hospital_image' => UploadedFile::fake()->image('image.jpg'),
            'hospital_name' => 'Test Hospital',
            'hospital_serial' => 852545, 
        ]);
        $response = $this->delete("admin/hospital/".Hospital::first()->id);
        $this->assertCount(0,Hospital::all());
    }
    
}
