<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Skills;
use App\Models\BlogTags;
use App\Models\Messages;
use App\Models\Projects;
use App\Models\Services;
use App\Models\BlogPosts;
use App\Models\Educations;
use App\Models\Experiences;
use App\Models\SocialMedias;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->user = Auth::user();
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['blog_categories'] = BlogCategories::all();
        $this->data['blog_tags'] = BlogTags::all();
        $this->data['blog_posts'] = BlogPosts::all();
        $this->data['educations'] = Educations::all();
        $this->data['experiences'] = Experiences::all();
        $this->data['messages'] = Messages::all();
        $this->data['projects'] = Projects::all();
        $this->data['services'] = Services::all();
        $this->data['skills'] = Skills::all();
        $this->data['social_medias'] = SocialMedias::all();
        $this->data['testimonials'] = Testimonials::all();
        $this->data['users'] = User::all();
        return view('ar.dashboard', $this->data);
    }
}
