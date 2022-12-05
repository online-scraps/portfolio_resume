<!-- BEGIN: Account Menu -->
<div class="intro-x dropdown w-8 h-8">
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
        <img alt="Midone Tailwind HTML Admin Template" src="/ar/dist/images/profile-4.jpg">
    </div>
    <div class="dropdown-box w-56">
        <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
            <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                <div class="font-medium">{{ $user->name }}</div>
                <div class="text-xs text-theme-41 dark:text-gray-600">{{ $user->getRoleNameForAuthUser($user->id) }}</div>
            </div>
            <div class="p-2">
                <a href=""
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                    <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add User </a>
                <a href=""
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
            </div>
            <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                <a href="{{ route('logout') }}"
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Account Menu -->
