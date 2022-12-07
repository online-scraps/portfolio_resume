@extends('layouts.ar')

@section('title')
    All Educations | Admin
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
            href="{{ route('admin.projects.index') }}" class="breadcrumb--active">All Educations</a> </div>
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
            All Educations
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @if ($user->hasPermissionTo('create educations'))
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" data-toggle="modal"
                        data-target="#create-modal">
                        Add New Education
                    </a>
                </div>
            @endif

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2 hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">#</th>
                            <th class="whitespace-no-wrap">{{ __('portfolio.educations.course') }}</th>
                            <th class="whitespace-no-wrap">{{ __('portfolio.educations.institute') }}</th>
                            <th class="whitespace-no-wrap">{{ __('portfolio.educations.grade') }}</th>
                            <th class="whitespace-no-wrap">{{ __('portfolio.educations.total_grade') }}</th>
                            <th class="text-center whitespace-no-wrap">{{ __('portfolio.educations.start_date') }}</th>
                            <th class="text-center whitespace-no-wrap">{{ __('portfolio.educations.end_date') }}</th>
                            <th class="text-center whitespace-no-wrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($educations as $education)
                            <tr class="intro-x">
                                <td>
                                </td>
                                <td>
                                    <a href="javascript:;"
                                        class="font-medium whitespace-no-wrap">{{ $education->getModelData('course', $education->id) }}</a>
                                </td>
                                <td>
                                    <a href="javascript:;"
                                        class="font-medium whitespace-no-wrap">{{ $education->getModelData('institute', $education->id) }}</a>
                                </td>
                                <td class="">{{ $education->getModelData('grade', $education->id) }}</td>
                                <td class="">{{ $education->getModelData('total_grade', $education->id) }}</td>
                                <td class="">{{ $education->getModelData('start_date', $education->id)->toDateString() }}</td>
                                <td class="">{{ $education->getModelData('end_date', $education->id)->toDateString() }}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex">
                                        @if ($user->hasPermissionTo('update projects'))
                                            <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                                data-target="#edit-modal-{{ $education->id }}"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                            </a>
                                            <!-- BEGIN: Edit Modal -->
                                            <div class="modal" id="edit-modal-{{ $education->id }}">
                                                <div class="modal__content modal__content--xl">
                                                    <div
                                                        class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                                        <h2 class="font-medium text-base mr-auto">Edit</h2>
                                                    </div>
                                                    <form action="{{ route('admin.educations.update', $education->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label>{{ __('portfolio.educations.course') }}</label>
                                                                <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="{{ __('portfolio.educations.course') }}"
                                                                    name="name"
                                                                    value="{{ $education->getModelData('course', $education->id) }}">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label>{{ __('portfolio.educations.institute') }}</label>
                                                                <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="{{ __('portfolio.educations.institute') }}"
                                                                    name="name"
                                                                    value="{{ $education->getModelData('institute', $education->id) }}">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label>
                                                                    {{ __('portfolio.educations.grade') }}
                                                                </label>
                                                                <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="{{ __('portfolio.educations.grade') }}"
                                                                    name="grade"
                                                                    value="{{ $education->getModelData('grade', $education->id) }}">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label>{{ __('portfolio.educations.total_grade') }}</label>
                                                                <input type="text"
                                                                    class="input w-full border mt-2 flex-1"
                                                                    placeholder="{{ __('portfolio.educations.total_grade') }}"
                                                                    name="total_grade"
                                                                    value="{{ $education->getModelData('total_grade', $education->id) }}">
                                                            </div>
                                                            {{-- {{ dd($education->getModelData('start_date', $education->id)->toDateString()) }} --}}
                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label>
                                                                    {{ __('portfolio.educations.start_date') }}
                                                                </label>
                                                                <input class="datepicker input w-full border block mx-auto"
                                                                    data-single-mode="true" name="start_date"
                                                                    value="{{ $education->getModelData('start_date', $education->id)->toDateString() }}">

                                                            </div>
                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label>{{ __('portfolio.educations.end_date') }}</label>
                                                                <input class="datepicker input w-full border block mx-auto"
                                                                    data-single-mode="true" name="end_date"
                                                                    value="{{ $education->getModelData('end_date', $education->id)->toDateString() }}">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label for="exampleFormControlTextarea1"
                                                                    class="form-label inline-block mb-2 text-gray-700">{{ __('portfolio.educations.description') }}</label>
                                                                <textarea
                                                                    class="form-control
                                                                                block
                                                                                w-full
                                                                                px-3
                                                                                py-1.5
                                                                                text-base
                                                                                font-normal
                                                                                text-gray-700
                                                                                bg-white bg-clip-padding
                                                                                border border-solid border-gray-300
                                                                                rounded
                                                                                transition
                                                                                ease-in-out
                                                                                m-0
                                                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="exampleFormControlTextarea1" name="description" rows="3"
                                                                    placeholder="{{ __('portfolio.educations.description') }}">{{ $education->getModelData('description', $education->id) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center"
                                                            text-center> <button type="button"
                                                                class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="button w-100 bg-theme-12 text-white"> Update
                                                                Education</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- END: Edit Modal -->
                                        @endif
                                        @if ($user->hasPermissionTo('delete educations'))
                                            <a class="flex items-center text-theme-6" href="javascript:;"
                                                onclick="deleteRecord('#delete_form-{{ $education->id }}');"> <i
                                                    data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            <form id="delete_form-{{ $education->id }}"
                                                action="{{ route('admin.educations.destroy', $education->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>


                        @empty
                            <tr>
                                <td colspan="5">No Educations Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
        <!-- BEGIN: Create Confirmation Modal -->
        <div class="modal" id="create-modal">
            <div class="modal__content modal__content--xl ">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">Create New Education</h2>
                </div>
                <form action="{{ route('admin.educations.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12"> <label>{{ __('portfolio.educations.course') }}</label>
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Course"
                                name="course" value="{{ old('course') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label>{{ __('portfolio.educations.institute') }}</label>
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Institute"
                                name="institute" value="{{ old('institute') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-6"> <label>{{ __('portfolio.educations.grade') }}</label>
                            <input type="text" class="input w-full border mt-2 flex-1"
                                placeholder="{{ __('portfolio.educations.grade') }}" name="grade"
                                value="{{ old('grade') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-6"> <label>{{ __('portfolio.educations.total_grade') }}</label>
                            <input type="text" class="input w-full border mt-2 flex-1"
                                placeholder="{{ __('portfolio.educations.total_grade') }}" name="total_grade"
                                value="{{ old('total_grade') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label>{{ __('portfolio.educations.start_date') }}</label>
                            <input data-single-mode="true" class="datepicker input w-full border block mx-auto"
                                placeholder="{{ __('portfolio.educations.start_date') }} (AD)" name="start_date"
                                value="{{ old('start_date') }}">

                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label>{{ __('portfolio.educations.end_date') }}</label>
                            <input data-single-mode="true" class="datepicker input w-full border block mx-auto"
                                placeholder="{{ __('portfolio.educations.end_date') }} (AD)" name="end_date"
                                value="{{ old('end_date') }}">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="exampleFormControlTextarea1"
                                class="form-label inline-block mb-2 text-gray-700">{{ __('portfolio.educations.description') }}</label>
                            <textarea
                                class="form-control
                                        block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlTextarea1" name="description" rows="3"
                                placeholder="{{ __('portfolio.educations.description') }}"></textarea>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5 text-center" text-center>
                        <button type="button"
                            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="button w-100 bg-theme-9 text-white"> Create Education</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Create Confirmation Modal -->
    </div>
@endsection

@section('script')
@endsection
