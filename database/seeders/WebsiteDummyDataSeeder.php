<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogTags;
use App\Models\BlogCategories;
use App\Models\BlogPosts;
use App\Models\Educations;
use App\Models\Experiences;
use App\Models\Messages;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Skills;
use App\Models\SocialMedias;
use App\Models\Testimonials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WebsiteDummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin@1234'),
        ]);
        User::factory(10)->create();
        BlogCategories::factory(5)->create();
        BlogTags::factory(10)->create();
        BlogPosts::factory(10)->create();
        Educations::factory(3)->create();
        Experiences::factory(2)->create();
        Messages::factory(10)->create();
        Projects::factory(10)->create();
        Services::factory(10)->create();
        Skills::factory(10)->create();
        SocialMedias::factory(5)->create();
        Testimonials::factory(10)->create();
    }
}
