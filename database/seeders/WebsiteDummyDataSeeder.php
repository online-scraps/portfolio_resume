<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use App\Models\Skills;
use App\Models\BlogTags;
use App\Models\Messages;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Role;
use App\Models\BlogPosts;
use App\Models\Educations;
use App\Models\Experiences;
use Illuminate\Support\Str;
use App\Models\SocialMedias;
use App\Models\Testimonials;
use App\Models\BlogCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class WebsiteDummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dd('ok');
        $user1 = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('Super@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        $role1 = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);
        $user1->assignRole($role1);

        $user2 = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        $role2 = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        $user2->assignRole($role2);

        $user3 = User::create([
            'name' => 'Example (Test)',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        $role3 = Role::create([
            'name' => 'Example Test',
            'guard_name' => 'web',
        ]);
        $user3->assignRole($role3);

        $user4 = User::create([
            'name' => 'Example (Admin)',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        $role4 = Role::create([
            'name' => 'Example Admin',
            'guard_name' => 'web',
        ]);
        $user4->assignRole($role4);

        $user5 = User::create([
            'name' => 'Example (Super Admin)',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        $role5 = Role::create([
            'name' => 'Example Super Admin',
            'guard_name' => 'web',
        ]);
        $user5->assignRole($role5);


        // Auth
        User::factory(10)->create();
        // Role::factory(10)->create();
        // Permission::factory(10)->create();

        // Blog
        BlogCategories::factory(5)->create();
        BlogTags::factory(10)->create();
        BlogPosts::factory(10)->create();

        // Portfolio
        Educations::factory(3)->create();
        Experiences::factory(2)->create();
        Messages::factory(10)->create();
        Projects::factory(10)->create();
        Services::factory(10)->create();
        Skills::factory(10)->create();
        SocialMedias::factory(5)->create();
        Testimonials::factory(10)->create();

        Artisan::call('generate:permissions');

    }
}
