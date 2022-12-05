<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'list projects']);
        // Permission::create(['name' => 'create projects']);
        // Permission::create(['name' => 'update projects']);
        // Permission::create(['name' => 'delete projects']);

        // create roles and assign existing permissions
        // $role1 = Role::create(['name' => 'projecteditor']);
        // $role1->givePermissionTo('list projects');
        // $role1->givePermissionTo('create projects');
        // $role1->givePermissionTo('update projects');

        // $role2 = Role::create(['name' => 'admin']);
        // $role2->givePermissionTo('update projects');
        // Permission::create(['name' => 'list projects']);
        // $role2->givePermissionTo('delete projects');

        // $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example User',
        //     'email' => 'test@example.com',
        // ]);
        // $user->assignRole($role1);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        // ]);
        // $user->assignRole($role2);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);

    }
}
