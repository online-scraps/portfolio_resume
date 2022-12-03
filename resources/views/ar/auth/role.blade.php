@extends('layouts.ar')

@section('title')
    All Roles | Admin
@endsection

@section('head')
@endsection

@section('breadcrumb')
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="{{ route('admin.dashboard') }}"
            class="">Dashboard</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a
            href="{{ route('admin.roles.index') }}" class="breadcrumb--active">All Roles</a> </div>
@endsection
@section('body')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i>
                <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <img alt="Midone Tailwind HTML Admin Template" src="/ar/dist/images/profile-1.jpg">
                </div>
                <div class="dropdown-box w-56">
                    <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                            <div class="font-medium">John Travolta</div>
                            <div class="text-xs text-theme-41 dark:text-gray-600">DevOps Engineer</div>
                        </div>
                        <div class="p-2">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10">
            All Roles
        </h2>
        {{-- @include('ar.partials.permissionsColumn', ['role' => $roles[0]]) --}}
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                    data-target="#create-modal">Add New Role</a>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2 hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">#</th>
                            <th class="whitespace-no-wrap">Role Name</th>
                            <th class="text-center whitespace-no-wrap">Permissions</th>
                            <th class="text-center whitespace-no-wrap">Users</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap">{{ $role->name }}</a>
                                </td>
                                <td class="text-center">
                                    @include('ar.partials.permissionsColumn')
                                </td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap">
                                        {{ __('1') }}</div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                            data-target="#edit-modal-{{ $role->id }}"> <i data-feather="check-square"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6" href="javascript:;"
                                            onclick="deleteRecord('#delete_form-{{ $role->id }}');"> <i
                                                data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        <form id="delete_form-{{ $role->id }}"
                                            action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- BEGIN: Edit Modal -->
                            <div class="modal" id="edit-modal-{{ $role->id }}">
                                <div class="modal__content">
                                    <div
                                        class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                        <h2 class="font-medium text-base mr-auto">Edit</h2>
                                    </div>
                                    <form action="{{ route('admin.roles.update', $role->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                            <div class="col-span-12 sm:col-span-12"> <label>Name</label> <input
                                                    type="text" class="input w-full border mt-2 flex-1"
                                                    placeholder="Project name" name="name" value="{{ $role->name }}">
                                            </div>
                                            <div class="col-span-12 sm:col-span-12">
                                                @include('ar.partials.permissionsFields')
                                            </div>
                                        </div>
                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center"
                                            text-center> <button type="button"
                                                class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="button w-100 bg-theme-12 text-white"> Update
                                                Project</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END: Edit Modal -->
                        @empty
                            <tr>
                                <td colspan="5">No Roles Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
        <!-- BEGIN: Create Confirmation Modal -->
        <div class="modal" id="create-modal">
            <div class="modal__content modal__content--lg ">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">Create New Role</h2>
                </div>
                <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12"> <label>Name</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Role name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <div class="mt-3"> <label>{{ __('All Permissions') }}</label>
                                    @include('ar.partials.permissionsFields')
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center" text-center>
                        <button type="button"
                            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="button w-100 bg-theme-9 text-white"> Create Project</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
@endsection
