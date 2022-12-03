<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/ar/dist/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="index.html" class="menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Authentication <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Users </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.roles.index') }}" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Role </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.permissions') }}" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Permissions </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.projects.index') }}" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Projects </div>
            </a>
        </li>
    </ul>
</div>
