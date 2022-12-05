<!DOCTYPE html>
<html lang="en">

<!-- index-754:31-->

<head>
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
    <link rel="icon" type="image/png" sizes="32x32" href="/hr//hr/images/favicon.ico">

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
    @include('hr.partials.color-panel')
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
    <script>
        $(document).ready(function() {
            //=========================================
            //  Water Effect
            //=========================================

            $('.banner_water_effect').ripples({
                resolution: 256,
                dropRadius: 20,
                perturbance: 0.03,
                interactive: true,
            });
            //  Smoothscroll js
            //=========================================
            $("a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 1000, function() {

                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>

    @yield('script')
</body>

<!-- index-754:31-->

</html>
