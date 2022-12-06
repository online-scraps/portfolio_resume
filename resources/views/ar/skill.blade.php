@extends('layouts.ar')

@section('title')
    All Skills | Admin
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
            href="{{ route('admin.projects.index') }}" class="breadcrumb--active">All Skills</a> </div>
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
            All Skills
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @if ($user->hasPermissionTo('create services'))
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                        data-target="#create-modal">
                        Add New Skill
                    </a>
                </div>
            @endif

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2 hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">#</th>
                            <th class="whitespace-no-wrap">Skill Name</th>
                            <th class="text-center whitespace-no-wrap">Percentage</th>
                            <th class="text-center whitespace-no-wrap">Skill Type</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skills as $skill)
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap">{{ $skill->name }}</a>
                                </td>
                                <td>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap">
                                        {!! $skill->percentage !!}
                                    </div>
                                </td>
                                <td class="">
                                    {{ $skill->getSkillType() }}
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex">
                                        @if ($user->hasPermissionTo('update skills'))
                                            <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                                data-target="#edit-modal-{{ $skill->id }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                            </a>
                                            <!-- BEGIN: Edit Modal -->
                                            <div class="modal" id="edit-modal-{{ $skill->id }}">
                                                <div class="modal__content modal__content--lg ">
                                                    <div
                                                        class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                        <h2 class="font-medium text-base mr-auto">Edit</h2>
                                                    </div>
                                                    <form action="{{ route('admin.services.update', $skill->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                                            <div class="col-span-12 sm:col-span-12"> <label>Name</label>
                                                                {{-- <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="Project name" name="name"
                                                                    value="{{ $skill->getServiceName($skill->id) }}"> --}}
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label>Description</label>
                                                                {{-- <textarea class="input w-full border mt-2 flex-1" name="description" id="" cols="30" rows="10">
                                                                        {{ $skill->getServiceDescription($skill->id) }}
                                                                    </textarea> --}}
                                                                    <div data-simple-toolbar="true" class="editor" name="description">
                                                                        {{-- {{ $skill->getServiceDescription($skill->id) }} --}}
                                                                    </div>
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label>Icon</label>
                                                                {{-- <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="Icon for this skill" name="icon"
                                                                    value="{{ $skill->getServiceIcon($skill->id) }}"> --}}
                                                            </div>
                                                        </div>
                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center"
                                                            text-center> <button type="button"
                                                                class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="button w-100 bg-theme-12 text-white"> Update
                                                                Skill</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- END: Edit Modal -->
                                        @endif
                                        @if ($user->hasPermissionTo('delete skills'))
                                            <a class="flex items-center text-theme-6" href="javascript:;"
                                                onclick="deleteRecord('#delete_form-{{ $skill->id }}');"> <i
                                                    data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            <form id="delete_form-{{ $skill->id }}"
                                                action="{{ route('admin.services.destroy', $skill->id) }}" method="POST"
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
                                <td colspan="5">No Skill Found</td>
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
                <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12"> <label>Name</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Project name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label>Description</label>
                            <div data-simple-toolbar="true" class="editor" name="description"></div>
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label>Icon</label> <input type="text"
                                class="input w-full border mt-2 flex-1" placeholder="Icon for this service"
                                name="icon" value="{{ old('icon') }}">
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center" text-center>
                        <button type="button"
                            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="button w-100 bg-theme-9 text-white"> Create Service</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
@endsection
