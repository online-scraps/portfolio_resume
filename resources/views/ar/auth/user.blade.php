@extends('layouts.ar')

@section('title')
    All Users | Admin
@endsection

@section('head')
@endsection

@section('breadcrumb')
    @php
        $userId = Auth::id();
        $user = App\Models\User::find($userId);
    @endphp
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="{{ route('admin.dashboard') }}"
            class="">Dashboard</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a
            href="{{ route('admin.projects.index') }}" class="breadcrumb--active">All Users</a> </div>
@endsection
@section('body')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="/" class="">Application</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i>
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb--active">Dashboard</a>
            </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Account Menu -->
            @include('ar.partials.myAccount')
            <!-- END: Account Menu -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10">
            All Users
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @if ($user->hasPermissionTo('create user'))
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                        data-target="#create-modal">Add New User</a>
                </div>
            @endif

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2 hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">#</th>
                            <th class="whitespace-no-wrap">User Name</th>
                            <th class="text-center whitespace-no-wrap">Email</th>
                            <th class="text-center whitespace-no-wrap">Role</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap">{{ $user->name }}</a>
                                </td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $user->getRoleNameForAuthUser($user->id) }}
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        @if ($user->hasPermissionTo('update user'))
                                            <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                                data-target="#edit-modal-{{ $user->id }}">
                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                                    Edit
                                                    <!-- BEGIN: Edit Modal -->
                                                    <div class="modal" id="edit-modal-{{ $user->id }}">
                                                        <div class="modal__content">
                                                            <div
                                                                class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                                <h2 class="font-medium text-base mr-auto">Edit</h2>
                                                            </div>
                                                            <form action="{{ route('admin.users.update', $user->id) }}" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                                                    <div class="col-span-6 sm:col-span-12"> <label>Name</label> <input
                                                                            type="text" class="input w-full border mt-2 flex-1"
                                                                            placeholder="Project name" name="name"
                                                                            value="{{ $user->getOldNameForEdit($user->id) }}">
                                                                    </div>
                                                                    <div class="col-span-6 sm:col-span-6"> <label>Email</label> <input
                                                                            type="email" class="input w-full border mt-2 flex-1"
                                                                            placeholder="Important Meeting" name="email"
                                                                            value="{{ $user->getOldEmailForEdit($user->id) }}"> </div>
                                                                    <div class="col-span-12 sm:col-span-6"> <label>Role</label> <select
                                                                            class="input w-full border mt-2 flex-1" name="role_id"
                                                                            value="{{ old('role_id') }}">
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}"
                                                                                    {{ $user->getRoleIdForAuthUser($user->id, $role->id) ? 'selected' : '' }}>
                                                                                    {{ $role->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-span-12 sm:col-span-6"> <label>Password</label> <input
                                                                            type="password" class="input w-full border mt-2 flex-1"
                                                                            placeholder="User Password" name="password"
                                                                            value="{{ old('password') }}">
                                                                    </div>
                                                                    <div class="col-span-12 sm:col-span-6"> <label>Confirm Password</label> <input
                                                                            type="password" class="input w-full border mt-2 flex-1"
                                                                            placeholder="Confirm Password" name="password_confirmation"
                                                                            value="{{ old('password_confirmation') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center"
                                                                    text-center> <button type="button"
                                                                        class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="button w-100 bg-theme-12 text-white"> Update
                                                                        User</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- END: Edit Modal -->
                                            </a>
                                        @endif
                                        @if ($user->hasPermissionTo('delete user'))
                                            <a class="flex items-center text-theme-6" href="javascript:;"
                                                onclick="deleteRecord('#delete_form-{{ $user->id }}');">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                                    Delete
                                                </a>
                                                <form id="delete_form-{{ $user->id }}"
                                                    action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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
                                <td colspan="5">No Users Found</td>
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
                    <h2 class="font-medium text-base mr-auto">Create New Project</h2>
                </div>
                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-6 sm:col-span-12"> <label>Name</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Project name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-6"> <label>Email</label> <input type="email"
                                class="input w-full border mt-2 flex-1" placeholder="Important Meeting" name="email">
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Role</label> <select
                                class="input w-full border mt-2 flex-1" name="role_id" value="{{ old('role_id') }}">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Password</label> <input type="password"
                                class="input w-full border mt-2 flex-1" placeholder="User Password" name="password"
                                value="{{ old('password') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Confirm Password</label> <input type="password"
                                class="input w-full border mt-2 flex-1" placeholder="Confirm Password"
                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center" text-center>
                        <button type="button"
                            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="button w-100 bg-theme-9 text-white"> Create User</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
@endsection
