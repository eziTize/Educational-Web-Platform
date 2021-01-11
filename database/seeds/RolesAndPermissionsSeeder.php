<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'view country']);
        Permission::create(['name' => 'create country']);
        Permission::create(['name' => 'edit country']);
        Permission::create(['name' => 'delete country']);

        Permission::create(['name' => 'view zone']);
        Permission::create(['name' => 'create zone']);
        Permission::create(['name' => 'edit zone']);
        Permission::create(['name' => 'delete zone']);

        Permission::create(['name' => 'view media']);
        Permission::create(['name' => 'create media']);
        Permission::create(['name' => 'edit media']);
        Permission::create(['name' => 'delete media']);

        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        Permission::create(['name' => 'view profile descriptions']);
        Permission::create(['name' => 'create profile descriptions']);
        Permission::create(['name' => 'edit profile descriptions']);
        Permission::create(['name' => 'delete profile descriptions']);

        Permission::create(['name' => 'view profile languages']);
        Permission::create(['name' => 'create profile languages']);
        Permission::create(['name' => 'edit profile languages']);
        Permission::create(['name' => 'delete profile languages']);

        Permission::create(['name' => 'view profile visibilities']);
        Permission::create(['name' => 'create profile visibilities']);
        Permission::create(['name' => 'edit profile visibilities']);
        Permission::create(['name' => 'delete profile visibilities']);

        Permission::create(['name' => 'view profile categories']);
        Permission::create(['name' => 'create profile categories']);
        Permission::create(['name' => 'edit profile categories']);
        Permission::create(['name' => 'delete profile categories']);

        Permission::create(['name' => 'view profile accomplishments']);
        Permission::create(['name' => 'create profile accomplishments']);
        Permission::create(['name' => 'edit profile accomplishments']);
        Permission::create(['name' => 'delete profile accomplishments']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'learner']);
        $role->givePermissionTo(['view articles']);

        // or may be done by chaining
        $role = Role::create(['name' => 'teacher'])
            ->givePermissionTo(['view articles']);

        $role = Role::create(['name' => 'admin'])
        ->givePermissionTo(['view articles', 'create articles','edit articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

    }
}
