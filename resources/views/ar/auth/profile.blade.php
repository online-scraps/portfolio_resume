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
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                            <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                        <div class="search-result">
                            <div class="search-result__content">
                                <div class="search-result__content__title">Pages</div>
                                <div class="mb-5">
                                    <a href="" class="flex items-center">
                                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                        <div class="ml-3">Mail Settings</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                                        <div class="ml-3">Users & Permissions</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                        <div class="ml-3">Transactions Report</div>
                                    </a>
                                </div>
                                <div class="search-result__content__title">Users</div>
                                <div class="mb-5">
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-7.jpg">
                                        </div>
                                        <div class="ml-3">Brad Pitt</div>
                                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">bradpitt@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-1.jpg">
                                        </div>
                                        <div class="ml-3">Denzel Washington</div>
                                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-12.jpg">
                                        </div>
                                        <div class="ml-3">Brad Pitt</div>
                                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">bradpitt@left4code.com</div>
                                    </a>
                                    <a href="" class="flex items-center mt-2">
                                        <div class="w-8 h-8 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-10.jpg">
                                        </div>
                                        <div class="ml-3">Arnold Schwarzenegger</div>
                                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">arnoldschwarzenegger@left4code.com</div>
                                    </a>
                                </div>
                                <div class="search-result__content__title">Products</div>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-1.jpg">
                                    </div>
                                    <div class="ml-3">Nike Air Max 270</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-10.jpg">
                                    </div>
                                    <div class="ml-3">Nikon Z6</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-15.jpg">
                                    </div>
                                    <div class="ml-3">Oppo Find X2 Pro</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/preview-13.jpg">
                                    </div>
                                    <div class="ml-3">Apple MacBook Pro 13</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">PC &amp; Laptop</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                        <div class="notification-content pt-2 dropdown-box">
                            <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                                <div class="notification-content__title">Notifications</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-7.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Brad Pitt</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-1.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">06:05 AM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-12.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Brad Pitt</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-10.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Arnold Schwarzenegger</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                                <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-15.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="/ar/dist/images/profile-12.jpg">
                        </div>
                        <div class="dropdown-box w-56">
                            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                    <div class="font-medium">Brad Pitt</div>
                                    <div class="text-xs text-theme-41 dark:text-gray-600">Frontend Engineer</div>
                                </div>
                                <div class="p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </div>
                                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Update Profile
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Profile Menu -->
                    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/ar/dist/images/profile-6.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base">Leonardo DiCaprio</div>
                                    <div class="text-gray-600">Backend Engineer</div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-300"></i> </a>
                                    <div class="dropdown-box w-56">
                                        <div class="dropdown-box__content box dark:bg-dark-1">
                                            <div class="p-4 border-b border-gray-200 dark:border-dark-5 font-medium">Export Options</div>
                                            <div class="p-2">
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    <i data-feather="box" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia
                                                    <div class="text-xs text-white px-1 rounded-full bg-theme-6 ml-auto">10</div>
                                                </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="layout" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="sidebar" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia </a>
                                            </div>
                                            <div class="px-3 py-3 border-t border-gray-200 dark:border-dark-5 font-medium flex">
                                                <button type="button" class="button button--sm bg-theme-1 text-white">Settings</button>
                                                <button type="button" class="button button--sm bg-gray-200 text-gray-600 dark:bg-dark-5 dark:text-gray-300 ml-auto">View Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a>
                            </div>
                            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                                <a class="flex items-center" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks </a>
                                <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information </a>
                            </div>
                            <div class="p-5 border-t flex dark:border-dark-5">
                                <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                                <button type="button" class="button button--sm border text-gray-700 dark:border-dark-5 dark:bg-dark-5 dark:text-gray-300 ml-auto">New Quick Link</button>
                            </div>
                        </div>
                    </div>
                    <!-- END: Profile Menu -->
                    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                        <!-- BEGIN: Display Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Display Information
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-4">
                                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="/ar/dist/images/profile-6.jpg">
                                                <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 xl:col-span-8">
                                        <div>
                                            <label>Display Name</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="Leonardo DiCaprio" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>Nearest MRT Station</label>
                                            <div class="mt-2">
                                                <select data-search="true" class="tail-select w-full">
                                                    <option value="1">Admiralty</option>
                                                    <option value="2">Aljunied</option>
                                                    <option value="3">Ang Mo Kio</option>
                                                    <option value="4">Bartley</option>
                                                    <option value="5">Beauty World</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Postal Code</label>
                                            <div class="mt-2">
                                                <select data-search="true" class="tail-select w-full">
                                                    <option value="1">018906 - 1 STRAITS BOULEVARD SINGA...</option>
                                                    <option value="2">018910 - 5A MARINA GARDENS DRIVE...</option>
                                                    <option value="3">018915 - 100A CENTRAL BOULEVARD...</option>
                                                    <option value="4">018925 - 21 PARK STREET MARINA...</option>
                                                    <option value="5">018926 - 23 PARK STREET MARINA...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Address</label>
                                            <textarea class="input w-full border mt-2" placeholder="Adress">10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore</textarea>
                                        </div>
                                        <button type="button" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Display Information -->
                        <!-- BEGIN: Personal Information -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Personal Information
                                </h2>
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 xl:col-span-6">
                                        <div>
                                            <label>Email</label>
                                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="leonardodicaprio@left4code.com" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>Name</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="Leonardo DiCaprio" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label>ID Type</label>
                                            <select class="input w-full border mt-2">
                                                <option>IC</option>
                                                <option>FIN</option>
                                                <option>Passport</option>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label>ID Number</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="357821204950001">
                                        </div>
                                    </div>
                                    <div class="col-span-12 xl:col-span-6">
                                        <div>
                                            <label>Phone Number</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="65570828">
                                        </div>
                                        <div class="mt-3">
                                            <label>Address</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                                        </div>
                                        <div class="mt-3">
                                            <label>Bank Name</label>
                                            <div class="mt-2">
                                                <select data-search="true" class="tail-select w-full">
                                                    <option value="1">SBI - STATE BANK OF INDIA</option>
                                                    <option value="1">CITI BANK - CITI BANK</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Bank Account</label>
                                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="DBS Current 011-903573-0">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <a href="" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
                                    <button type="button" class="button w-20 bg-theme-1 text-white ml-auto">Save</button>
                                </div>
                            </div>
                        </div>
                        <!-- END: Personal Information -->
                        <!-- BEGIN: Change Password -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">
                                    Change Password
                                </h2>
                            </div>
                            <div class="p-5">
                                <div>
                                    <label>Old Password</label>
                                    <input type="password" class="input w-full border mt-2" placeholder="Input text">
                                </div>
                                <div class="mt-3">
                                    <label>New Password</label>
                                    <input type="password" class="input w-full border mt-2" placeholder="Input text">
                                </div>
                                <div class="mt-3">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="input w-full border mt-2" placeholder="Input text">
                                </div>
                                <button type="button" class="button bg-theme-1 text-white mt-4">Change Password</button>
                            </div>
                        </div>
                        <!-- END: Change Password -->
                    </div>

                </div>
            </div>
            <!-- END: Content -->
@endsection

@section('script')
@endsection
