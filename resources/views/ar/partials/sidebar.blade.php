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
        {{-- {{ dd(Auth::user(), Auth::id(), \App\Models\User::find(Auth::id()), $user->getRoleNames(), $user->hasPermissionTo('list projects')) }} --}}
        @if ($user->hasPermissionTo('list projects'))
            <li>
                <a href="{{ route('admin.projects.index') }}" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="side-menu__title"> Projects </div>
                </a>
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
