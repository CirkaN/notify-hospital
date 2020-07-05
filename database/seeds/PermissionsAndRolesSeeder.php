<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

 /**
  *   This is our super admin, the only account stored in users, we can rename our users migration to admins but I Will leave it like this because this is just for testing.
  *   email for login is "admin@mail.com"
  *   password for login is "ouradminpass"
  */
        $user = User::create([ 'name' => 'John Doe', 'email' => 'admin@mail.com', 'password' => bcrypt('ouradminpass')]); 
        

        //create a permission for reading notification, this will be used for doctors

        //create a role and give the desired permission
        $role = Role::create(['name' => 'dermatologist']);
            

    }
}
