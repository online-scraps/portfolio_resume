@extends('layouts.ar')

@section('title')
    All Projects | Admin
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
            href="{{ route('admin.projects.index') }}" class="breadcrumb--active">All Projects</a> </div>
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
            All Projects
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @if ($user->hasPermissionTo('create permission'))
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a href="{{ route('admin.permissions.generate') }}"
                        class="button text-white bg-theme-1 shadow-md mr-2">Generate Permissions</a>
                </div>
            @endif

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2 hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">#</th>
                            <th class="whitespace-no-wrap">Project Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap">{{ $permission->name }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No Permissions Found</td>
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
                <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12"> <label>Name</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Project name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label>Description</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Important Meeting" name="description">
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Category</label> <select
                                class="input w-full border mt-2 flex-1" name="category_id" value="{{ old('category_id') }}">
                                @foreach (App\Models\Projects::projectCategoryType() as $key => $value)
                                    <option value="{{ $key }}" {{ old('category_id') == $key ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>Link</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Link for this project" name="link"
                                value="{{ old('link') }}">
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
