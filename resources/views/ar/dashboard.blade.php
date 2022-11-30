@extends('layouts.ar')


@section('head')
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
                    <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-1.jpg">
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
        <!-- END: Top Bar -->


        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i
                                data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                                title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                                    class="w-4 h-4"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ isset($projects) ? count($projects) : "0" }}</div>
                                    <div class="text-base text-gray-600 mt-1">Projects</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"
                                                title="2% Lower than last month"> 2% <i data-feather="chevron-down"
                                                    class="w-4 h-4"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ isset($skills) ? count($skills) : "0" }}</div>
                                    <div class="text-base text-gray-600 mt-1">Skills</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                                title="12% Higher than last month"> 12% <i data-feather="chevron-up"
                                                    class="w-4 h-4"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ isset($educations) ? count($educations) : "0" }}</div>
                                    <div class="text-base text-gray-600 mt-1">Educations</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                                title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                                    class="w-4 h-4"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ isset($experiences) ? count($experiences) : "0" }}</div>
                                    <div class="text-base text-gray-600 mt-1">Experiences</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    @if (count($services) > 1)
                    <!-- BEGIN: Services -->
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">
                                All Services
                            </h2>
                            <a href="" class="ml-auto text-theme-1 dark:text-theme-10 truncate mx-5">See all</a>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator button px-2 border border-gray-400 dark:border-dark-5 flex items-center text-gray-700 dark:text-gray-600 mr-2"> <i data-feather="chevron-left" class="w-4 h-4"></i> </button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator button px-2 border border-gray-400 dark:border-dark-5 flex items-center text-gray-700 dark:text-gray-600"> <i data-feather="chevron-right" class="w-4 h-4"></i> </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    @foreach ($services->take(5) as $service)
                                        <div class="p-5">
                                            <div class="text-base font-medium truncate">{{ $service->name }}</div>
                                            <div class="text-gray-500 mt-1">{{ $service->created_at->diffForHumans() }}</div>
                                            <div class="text-gray-600 text-justify mt-1">{{ Str::limit($service->description, 25, '.....') }}</div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    <!-- END: Services -->
                    @endif
                    @if (count($projects) > 1)
                    <!-- BEGIN: Projects -->
                        <div class="intro-x flex items-center h-10 mt-5">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Projects
                            </h2>
                        </div>
                        <div class="mt-5">
                            @foreach ($projects->take(5) as $project)
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-15.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $service->name }}</div>
                                            <div class="text-gray-600 text-xs">{{ $project->created_at->format('d M Y') }}</div>
                                        </div>
                                        <div class="text-theme-9">+$48</div>
                                    </div>
                                </div>
                            @endforeach

                            <a href="{{ route('admin.projects.index') }}" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a>
                        </div>
                    <!-- END: Projects -->
                    @endif
                </div>
                @if (count($skills) > 1)

                <!-- BEGIN: Skills -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-6 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Skills
                        </h2>
                    </div>
                    <div class="mt-5">
                            @foreach ($skills->take(5) as $skill)
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-15.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $skill->name }}</div>
                                            <div class="text-gray-600 text-xs">{{$skill->created_at->format('d M Y')}}</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">{{ $skill->percentage }} %</div>
                                    </div>
                                </div>
                            @endforeach
                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a>
                    </div>
                </div>
                <!-- END: Skills -->
                @endif

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
