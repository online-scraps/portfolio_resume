@extends('layouts.ar')

@section('title')
    All Roles | Admin
@endsection

@section('head')
@endsection

@section('breadcrumb')
    {{-- @include('ar.partials.injectAuthUser') --}}
    @php
        $userId = Auth::id();
        $user = App\Models\User::find($userId);
    @endphp
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
            @include('ar.partials.myAccount')
            <!-- END: Account Menu -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10">
            All Roles
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @if ($user->hasPermissionTo('create role'))
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                        data-target="#create-modal">Add New Role</a>
                </div>
            @endif

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
                        {{-- {{ dd(count($role->users)) }} --}}
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap">{{ $role->name }}</a>
                                </td>
                                <td class="">
                                    @include('ar.partials.permissionsColumn')
                                </td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap">
                                        {{ count($role->users) }}</div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex">
                                        {{-- @if ($user->hasPermissionTo('update role')) --}}
                                            <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                                data-target="#edit-modal-{{ $role->id }}">
                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                                Edit
                                            </a>
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
                                        {{-- @endif --}}
                                        @if ($user->hasPermissionTo('delete role'))
                                            <a class="flex items-center text-theme-6" href="javascript:;"
                                                onclick="deleteRecord('#delete_form-{{ $role->id }}');">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                                    Delete
                                            </a>
                                            <form id="delete_form-{{ $role->id }}"
                                                action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>

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
        {{-- <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="create-modal"> --}}
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
