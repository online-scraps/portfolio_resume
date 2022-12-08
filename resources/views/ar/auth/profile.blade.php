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
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i
                    data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                    class="breadcrumb--active">Dashboard</a> </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Account Menu -->
            @include('ar.partials.myAccount')
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
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                src="{{ Avatar::create(Str::remove(')', Str::remove('(', $user->name)))->toBase64() }}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{ $user->name }}</div>
                            <div class="text-gray-600">{{ $user->getRoleNameForAuthUser($user->id) }}</div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                        <a href="javascript:;" class="flex items-center " id="btnDisplayInfo">
                            <i data-feather="box" class="w-4 h-4 mr-2"></i>
                            Display Information
                        </a>
                        <a href="javascript:;" class="flex items-center mt-5" id="btnChangePassword">
                            <i data-feather="lock" class="w-4 h-4 mr-2"></i>
                            Change Password
                        </a>
                        <a href="javascript:;" class="flex items-center text-theme-6 mt-5" id="btnDeleteAccount">
                            <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>
                            Delete Account
                        </a>
                        {{-- <a href="" class="text-theme-6 flex items-center"> <i data-feather="trash-2"
                                class="w-4 h-4 mr-1"></i> Delete Account </a> --}}
                    </div>
                </div>
            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                <!-- BEGIN: Display Information -->
                <div class="intro-y box lg:mt-5" id="display_information">
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
                                        <img class="rounded-md" alt="Midone Tailwind HTML Admin Template"
                                            src="{{ Avatar::create(Str::remove(')', Str::remove('(', $user->name)))->toBase64() }}"
                                            id="upload-image">
                                        <div title="Remove this profile photo?"
                                            class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                                            <i data-feather="x" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                    <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="button w-full bg-theme-1 text-white">Change
                                            Photo</button>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"
                                            id="upload-image-input" onchange="changeImage()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <div>
                                    <label>Display Name</label>
                                    <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                                        placeholder="Input text" value="Leonardo DiCaprio" disabled>
                                </div>
                                <div class="mt-3">
                                    <label>Email</label>
                                    <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2"
                                        placeholder="Input text" value="leonardodicaprio@left4code.com" disabled>
                                </div>
                                <div class="mt-3">
                                    <label>Address</label>
                                    <textarea class="input w-full border mt-2" placeholder="Adress">10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore</textarea>
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="button bg-theme-1 text-white">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Display Information -->
                <!-- BEGIN: Change Password -->
                <div class="intro-y box lg:mt-5" id="change_password">
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
    <script>
        $(document).ready(function() {
            $('#display_information').show();
            $('#change_password').hide();

            $('#btnDisplayInfo').addClass('text-theme-1 font-medium');
            $('#btnChangePassword').removeClass('text-theme-1 font-medium');

            $('#btnDisplayInfo').click(function(e) {
                $('#btnDisplayInfo').addClass('text-theme-1 font-medium');
                $('#btnChangePassword').removeClass('text-theme-1 font-medium');
                $('#display_information').show();
                $('#change_password').hide();
            });

            $('#btnChangePassword').click(function(e) {
                $('#btnDisplayInfo').removeClass('text-theme-1 font-medium');
                $('#btnChangePassword').addClass('text-theme-1 font-medium');
                $('#display_information').hide();
                $('#change_password').show();
            });

            $('#btnDeleteAccount').click(function(e) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white',
                        cancelButton: 'button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-6 text-white'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let userId = '{{ $user->id }}';
                        let csrfToken = '{{ csrf_token() }}';
                        debugger;
                        $.ajax({
                            type: 'DELETE',
                            url: '/admin/users/'+userId,
                            data: {
                                _token: csrfToken,
                                id: userId
                            },
                            success: function(data) {
                                debugger;
                                window.location.href = '/';
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                debugger;
                                swalWithBootstrapButtons.fire({
                                    title: 'Oops!',
                                    text: 'Something went wrong!',
                                    icon: 'error',
                                    confirmButtonText: 'OK, delete it!',
                                    reverseButtons: true
                                });
                                // swalWithBootstrapButtons.fire(
                                //         'Deleted!',
                                //         'Oops! Something occurred while deleting. Try again',
                                //         'error'
                                //     )
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })

            });
        });

        function changeImage() {
            // document.getElementById("upload-image").src = document.getElementById("upload-image-input").value;
            var output = document.getElementById('upload-image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }

    </script>
@endsection
