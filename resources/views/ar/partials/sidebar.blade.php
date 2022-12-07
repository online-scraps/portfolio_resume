<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/ar/dist/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}" class="side-menu ">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        @if ($user->hasPermissionTo('list blogtags') || $user->hasPermissionTo('list blogposts') || $user->hasPermissionTo('list blogcategories'))
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Blogs <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                @if ($user->hasPermissionTo('list blogtags'))
                    <li>
                        <a href="{{ route('admin.blog-tag.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Tags </div>
                        </a>
                    </li>
                @endif
                @if ($user->hasPermissionTo('list blogcategories'))
                    <li>
                        <a href="{{ route('admin.blog-category.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Categories </div>
                        </a>
                    </li>
                @endif
                @if ($user->hasPermissionTo('list blogposts'))
                    <li>
                        <a href="{{ route('admin.blog-post.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Posts </div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        @endif
        @if (
        $user->hasPermissionTo('list educations')
        || $user->hasPermissionTo('list experiences')
        || $user->hasPermissionTo('list messages')
        || $user->hasPermissionTo('list projects')
        || $user->hasPermissionTo('list services')
        || $user->hasPermissionTo('list skills')
        || $user->hasPermissionTo('list socialmedias')
        || $user->hasPermissionTo('list testimonials'))
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Portfolio <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                @if ($user->hasPermissionTo('list educations'))
                <li>
                    <a href="{{ route('admin.educations.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> Educations </div>
                    </a>
                </li>
            @endif
            @if ($user->hasPermissionTo('list experiences'))
                <li>
                    <a href="{{ route('admin.experience.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> Experiences </div>
                    </a>
                </li>
            @endif
            @if ($user->hasPermissionTo('list messages'))
            <li>
                <a href="{{ route('admin.message.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Messages </div>
                </a>
                </li>
            @endif
            @if ($user->hasPermissionTo('list projects'))
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> Projects </div>
                    </a>
                </li>
            @endif
            @if ($user->hasPermissionTo('list services'))
            <li>
                <a href="{{ route('admin.services.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Services </div>
                </a>
            </li>
            @endif
            @if ($user->hasPermissionTo('list skills'))
            <li>
                <a href="{{ route('admin.skill.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Skills </div>
                </a>
            </li>
            @endif
            @if ($user->hasPermissionTo('list socialmedias'))
            <li>
                <a href="{{ route('admin.socialmedia.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Social Medias </div>
                </a>
            </li>
            @endif
            @if ($user->hasPermissionTo('list testimonials'))
            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Testimonials </div>
                </a>
            </li>
            @endif
            </ul>
        </li>
        @endif
        @if ($user->hasPermissionTo('list user') || $user->hasPermissionTo('list role') || $user->hasPermissionTo('list permission'))
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Authentication <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                @if ($user->hasPermissionTo('list user'))
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Users </div>
                        </a>
                    </li>
                @endif
                @if ($user->hasPermissionTo('list role'))
                    <li>
                        <a href="{{ route('admin.roles.index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Roles </div>
                        </a>
                    </li>
                @endif
                @if ($user->hasPermissionTo('list permission'))
                    <li>
                        <a href="{{ route('admin.permissions') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Permissions </div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        @endif
    </ul>
</nav>
