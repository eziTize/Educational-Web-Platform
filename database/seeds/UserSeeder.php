<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\{
    ProfileVisibility,
    ProfileDescription,
    ProfileExtra
};
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->states('learner')->create()->each(function($user){
            $role = Role::findByName('learner');
            $user->assignRole($role);
            $user->givePermissionTo($role->getAllPermissions());

        });

        factory(User::class,8)->states('teacher')->create()->each(function($user){
            $faker = Faker\Factory::create();
            
            $role = Role::findByName('teacher');
            $user->assignRole($role);
            $user->givePermissionTo($role->getAllPermissions());

            //setting the profile visibility
            $visibility = ProfileVisibility::updateOrCreate(
                ['user_id' => $user->id],
                ['visibility_type'=>'0']
            );
            
            // Setting the profile linked description...
            $description = ProfileDescription::updateOrCreate(
                ['user_id' => $user->id],
                ['description'=>$faker->paragraph]
            );

            // Setting the profile linked extras...
            $profile_extra = ProfileExtra::updateOrCreate(
                ['user_id' => $user->id],
                ['travel_willingness'=>'0']
            );
            
        });

        factory(User::class,1)->states('admin')->create()->each(function($user){
            $role = Role::findByName('admin');
            $user->assignRole($role);
            $user->givePermissionTo($role->getAllPermissions());
            
        });
        
        factory(User::class,1)->states('super-admin')->create()->each(function($user){
            $role = Role::findByName('super-admin');
            $user->assignRole('super-admin');
            $user->givePermissionTo($role->getAllPermissions());

        });
    }
}
