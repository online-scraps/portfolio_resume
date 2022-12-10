<!DOCTYPE html>
<html lang="en">

<!-- index-754:31-->

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===== Meta Tag =====-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Runaway - Personal Portfolio HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="business, agency, blog, cv, creative, html, one page, personal, portfolio, resume, responsive, bootstrap, photography, designer, developer">
    <meta name="author" content="root">

    <!--	Css Links
    ==================================================-->
    <link rel="stylesheet" href="/hr/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hr/css/font-awesome.min.css">
    <link rel="stylesheet" href="/hr/fonts/flaticon.css">
    <link rel="stylesheet" href="/hr/css/plugins.css">
    <link rel="stylesheet" href="/hr/css/style.css">
    <link rel="stylesheet" href="/hr/css/color.css" id="color-change">


    <!-- Favicon
    ==================================================-->
    <link rel="icon" type="image/png" sizes="32x32" href="/hr/images/favicon.ico">

    <!--	Title
    ==================================================-->
    <title>@yield('title', 'Runaway - Personal Portfolio HTML Template')</title>

    @yield('head')

</head>

<body id="top" class="page-load">
    {{-- {{ dd('ok') }} --}}
    <!--	Start Back to top
 =================================================-->
    <a href="#" id="scroll" style="display: none;"><span></span></a>
    <!--	End Back to top
 ==================================================-->

    <!--	Preloader
 ==================================================-->
    <div class="preloader">
        <div class="lds-css ng-scope">
            <div class="lds-spinner" style="100%;height:100%">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Color Settings Start
 ==================================================-->
    @php
        $roleCheck = false;
        
        if (Auth::check()) {
            $user = \App\Models\User::find(Auth::id());
            $roleCheck = $user->maintainerCheck();
        }
    @endphp
    @if ($roleCheck)
        <div class="color-panel">
            <div class="maintainer-setting color_white bg_primary">
                <div class="text-center icon-spinner">
                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                </div>
            </div>
            <div class="switcher_layout">
                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Run Artisan Command
                </button>
            </div>
        </div>
    @endif
    <!--  Color Settings End
 ==============================================-->

    <!-- Wrapper Start
==================================================-->
    <div id="page_wrapper">
        <div class="row">
            <!-- Start Nav Menu
 ==============================================-->
            @include('hr.partials.navbar')
            <!-- End Nav Menu
 ==================================================-->
            {{-- {{ dd((\App\Http\Traits\AuthTrait::artisanCommands())) }} --}}
            {{-- {{ dd(json_decode(\App\Http\Traits\AuthTrait::jsonArtisanCommands())) }} --}}
            {{-- {{ dd(json_encode(\App\Http\Traits\AuthTrait::jsonArtisanCommands())) }} --}}
            {{-- {{ dd(\App\Http\Traits\AuthTrait::jsonArtisanCommands()) }} --}}

            @yield('body')

            <!--	Start Footer
 ===================================================-->
            @include('hr.partials.footer')
            <!--	End Footer
 ===================================================-->
        </div>
    </div>
    <!--	Wrapper End
=======================================================-->
    <!--	Js Links
 ===================================================-->
    <script src="/hr/js/jquery.min.js"></script>
    <script src="/hr/js/popper.min.js"></script>
    <script src="/hr/js/bootstrap.min.js"></script>
    <script src="/hr/js/plugins.js"></script>
    <script src="/hr/js/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/customScripts.js"></script>
    <script>
        function runCommandViaSelect() {

            let options = '<?php echo json_encode(\App\Http\Traits\AuthTrait::artisanCommands()); ?>';
            options = JSON.parse(options);
            // debugger;
            Swal.fire({
                title: 'Run Artisan Command',
                input: 'select',
                inputOptions: options,
                inputPlaceholder: 'Select a Command',
                showCancelButton: false,
                confirmButtonText: 'Execute Command',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: (command) => {
                    return $.ajax({
                        method: "POST",
                        url: '/maintainance/execute-command',
                        data: {
                            _token: '{{ csrf_token() }}',
                            command: command
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                return response.message;
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire(
                                'Oops!',
                                'Error occurred. Try again',
                                'error'
                            );
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: 'Congratulations',
                        text: `${result.value.message}`,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'Reload all changes to continue',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
            })
        }
    </script>
    @yield('script')

    @stack('script')
</body>

<!-- index-754:31-->

</html>
