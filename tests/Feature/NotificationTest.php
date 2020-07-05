<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

use App\User;
use App\Doctor;
use App\Notification;
class NotificationTest extends TestCase
{

    use RefreshDatabase;


        /** @test */
        public function create_a_new_notification(){
            $doctor = Doctor::create([ 'name' => 'John','surname' => 'John','hospital_id' => '1',  'email' => 'doctor@mail.com','token' => 'testpurposes', 'created_by' => 'Test', 'password' => bcrypt('ourcodpw')]); 
            $role = Role::create(['name' => 'dermatologist']);
            $doctor->assignRole('dermatologist');
            $this->actingAs(factory(User::class)->create(),'admin');
            $response = $this->post('admin/notification',[
                'content' => 'Testcontent',
                'target' => 'dermatologist',
            ]);
            $this->assertCount(1,Notification::all());
        }

}
