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
    <div class="color-panel">
        <div class="on-panel color_white bg_primary">
            <div class="text-center icon-spinner">
                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
            </div>
        </div>
        <div class="panel-box">
            <span class="panel-title">Theme Colors</span>
            <ul class="color-box">
                <li class="default" data-name="default" data-path="css/color.css" data-image="images/logo/1.png"
                    data-target="images/logo/1.png"></li>
                <li class="color_2" data-name="color_2" data-path="css/color/color-1.css" data-image="images/logo/2.png"
                    data-target="images/logo/2.png"></li>
                <li class="color_3" data-name="color_3" data-path="css/color/color-2.css" data-image="images/logo/3.png"
                    data-target="images/logo/3.png"></li>
                <li class="color_4" data-name="color_4" data-path="css/color/color-3.css" data-image="images/logo/4.png"
                    data-target="images/logo/4.png"></li>
                <li class="color_5" data-name="color_5" data-path="css/color/color-4.css" data-image="images/logo/5.png"
                    data-target="images/logo/5.png"></li>
                <li class="color_6" data-name="color_6" data-path="css/color/color-5.css" data-image="images/logo/6.png"
                    data-target="images/logo/6.png"></li>
                <li class="color_7" data-name="color_7" data-path="css/color/color-6.css" data-image="images/logo/7.png"
                    data-target="images/logo/7.png"></li>
                <li class="color_8" data-name="color_8" data-path="css/color/color-7.css" data-image="images/logo/8.png"
                    data-target="images/logo/8.png"></li>
                <li class="color_9" data-name="color_9" data-path="css/color/color-8.css" data-image="images/logo/9.png"
                    data-target="images/logo/9.png"></li>
                <li class="color_10" data-name="color_10" data-path="css/color/color-9.css"
                    data-image="images/logo/10.png" data-target="images/logo/10.png"></li>
                <li class="color_11" data-name="color_11" data-path="css/color/color-10.css"
                    data-image="images/logo/11.png" data-target="images/logo/11.png"></li>
                <li class="color_12" data-name="color_12" data-path="css/color/color-11.css"
                    data-image="images/logo/12.png" data-target="images/logo/12.png"></li>
                <li class="color_13" data-name="color_13" data-path="css/color/color-12.css"
                    data-image="images/logo/13.png" data-target="images/logo/13.png"></li>
                <li class="color_14" data-name="color_14" data-path="css/color/color-13.css"
                    data-image="images/logo/14.png" data-target="images/logo/14.png"></li>
            </ul>
        </div>
        <div class="switcher_layout">
            <span class="layout_title">Layout Style</span>
            <div class="radio_check">
                <input type="checkbox" id="layout_type" name="layout" value="Yes">
                <label class="bg_default text-left" for="layout_type"><span class="white_color">Full</span><span
                        class="secondary_color">Box</span></label>
            </div>
        </div>
        <div class="template_style">
            <span class="layout_title">Template Style</span>
            <ul>
                <li><a class="btn_link" href="index-7.html" target="blank">White Version</a></li>
                <li><a class="btn_link" href="index-8.html" target="blank">Black Version</a></li>
            </ul>
        </div>
        <div class="box_bg_style">
            <span class="layout_title">Background pattern</span>
            <div class="select_bg">
                <ul>
                    <li><input type="radio" name="radio" id="patrn1" value="pattern_1" /><label
                            for="patrn1" class="radios pattern1"></label></li>
                    <li><input type="radio" name="radio" id="patrn2" value="pattern_2" /><label
                            for="patrn2" class="radios pattern2"></label></li>
                    <li><input type="radio" name="radio" id="patrn3" value="pattern_3" /><label
                            for="patrn3" class="radios pattern3"></label></li>
                    <li><input type="radio" name="radio" id="patrn4" value="pattern_4" /><label
                            for="patrn4" class="radios pattern4"></label></li>
                    <li><input type="radio" name="radio" id="patrn5" value="pattern_5" /><label
                            for="patrn5" class="radios pattern5"></label></li>
                </ul>
            </div>
            <span class="layout_title">Background pattern</span>
            <div class="select_bg">
                <ul>
                    <li><input type="radio" name="radio" id="bg_img1" value="body_bg_1" /><label
                            for="bg_img1" class="radios body_image1"></label></li>
                    <li><input type="radio" name="radio" id="bg_img2" value="body_bg_2" /><label
                            for="bg_img2" class="radios body_image2"></label></li>
                    <li><input type="radio" name="radio" id="bg_img3" value="body_bg_3" /><label
                            for="bg_img3" class="radios body_image3"></label></li>
                    <li><input type="radio" name="radio" id="bg_img4" value="body_bg_4" /><label
                            for="bg_img4" class="radios body_image4"></label></li>
                    <li><input type="radio" name="radio" id="bg_img5" value="body_bg_5" /><label
                            for="bg_img5" class="radios body_image5"></label></li>
                    <li><input type="radio" name="radio" id="bg_img6" value="body_bg_6" /><label
                            for="bg_img6" class="radios body_image6"></label></li>
                    <li><input type="radio" name="radio" id="bg_img7" value="body_bg_7" /><label
                            for="bg_img7" class="radios body_image7"></label></li>
                    <li><input type="radio" name="radio" id="bg_img8" value="body_bg_8" /><label
                            for="bg_img8" class="radios body_image8"></label></li>
                    <li><input type="radio" name="radio" id="bg_img9" value="body_bg_9" /><label
                            for="bg_img9" class="radios body_image9"></label></li>
                    <li><input type="radio" name="radio" id="bg_img10" value="body_bg_10" /><label
                            for="bg_img10" class="radios body_image10"></label></li>
                </ul>
            </div>
            <div class="select_bg">
                <ul>
                    <li><input type="checkbox" name="runaway" id="bg_over" value="" /> Overlay</li>
                </ul>
            </div>
        </div>
    </div>
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
