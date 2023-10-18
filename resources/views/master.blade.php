@php
namespace App\Models;

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description"
        content="html 5 template, dentist, stomatologist, dental clinic template, medical template, clinic template, surgery clinic theme, plastic surgery template">
    <meta name="author" content="websmirno.site">
    <meta name="format-detection" content="telephone=no">
    <title>Medeye - HTML Website Template</title>
    <!-- Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiFdr5Z0WRIXKUOqoRRvzRQ5SkzhkUVjk"></script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .fixed-size {
            width: 100%;
            /* or whatever fixed width you want */
            
            object-fit: cover;
        }

        .fixed-size-department {
            width: 100%;
            /* or whatever fixed width you want */
            height: 400px;
            object-fit: cover;
        }
        .slick-next{
            width: 30px;
            height: 30px;
            margin-right: 20px; 
        }
        .slick-next:before{
            line-height: 15px
        }
        .slick-prev{
            width: 30px;
            height: 30px;
            margin-left: 20px; 
        }
        .slick-prev:before{
            line-height: 15px
        }

        .fixed-image-doctor {
            width: 100%;
            max-height: 370px;
            object-fit: cover
        }
        .fixed-image-post {
            width: 50px;
            height: 50px;
            object-fit: cover
        }

        /* The actual timeline (the vertical ruler) */
        .main-timeline-2 {
            position: relative;
        }

        /* Base styling for the button */
        .btn.btn-outline-light.btnsec1 {
            border-color: white;
            border-radius: 0px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: 700;
            border-width: 2px;
            padding: 8px 40px !important;
            /* Smooth transition effect */
        }


        .fixed-size-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            /* Adjust the padding as needed */
            background-color: #950000;
            /* Background color */
            color: #fff;
            /* Text color */
            border-radius: 4px;
            /* Rounded corners */
            font-size: 14px;
            /* Font size */
        }


        .vertical-line {
            border-left: 1px solid rgb(255, 255, 255);
            /* Line color and width */
            height: 100px;
            opacity: 0.5;
            /* Line height */
        }

        .line-container {
            display: flex;
            align-items: center;
            /* Vertical centering */
            justify-content: center;


        }




        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .gallery-item-width {
                width: 100%;

            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {

            .gallery-item-width {
                width: 100%
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {

            .gallery-item-width {
                width: 48% !important;

            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {

            .gallery-item-width {
                width: 31% !important;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .gallery-item-width {
                width: 23% !important;
            }

        }

        @media (max-width: 767.98px) {
            .vertical-line {
                border-left: none;
                /* No left border */
                border-top: 1px solid rgb(255, 255, 255);
                /* New border for horizontal line */
                width: 100px;
                /* Line width */
                height: 0;
                /* No height for horizontal line */
            }

            .line-container {
                width: 100%;
            }
        }

        /* Hover effect styling for the button */
        .btn.btn-outline-light.btnsec1:hover {
            background-color: white;
            /* Change background color on hover */
            color: black;
            /* Change text color on hover */
        }

        /* The actual timeline (the vertical ruler) */
        .main-timeline-2::after {
            content: "";
            position: absolute;
            width: 3px;
            background-color: #26c6da;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .timeline-2 {
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        /* The circles on the timeline */
        .timeline-2::after {
            content: "";
            position: absolute;
            width: 25px;
            height: 25px;
            right: -11px;
            background-color: #26c6da;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left-2 {
            padding: 0px 40px 20px 0px;
            left: 0;
        }

        /* Place the container to the right */
        .right-2 {
            padding: 0px 0px 20px 40px;
            left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left-2::before {
            content: " ";
            position: absolute;
            top: 18px;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right-2::before {
            content: " ";
            position: absolute;
            top: 18px;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        .right-2::after {
            left: -14px;
        }

        .alert {
            position: relative;
            top: 10;
            left: 0;
            width: auto;
            height: auto;
            padding: 10px;
            margin: 10px;
            line-height: 1.8;
            border-radius: 5px;
            cursor: hand;
            cursor: pointer;
            font-family: sans-serif;
            font-weight: 400;
        }

        .text-danger {
            color: #ff0e0e;
        }

        .alertCheckbox {
            display: none;
        }

        :checked+.alert {
            display: none;
        }

        .alertText {
            display: table;
            margin: 0 auto;
            text-align: center;
            font-size: 16px;
        }

        .alertClose {
            float: right;
            padding-top: 5px;
            font-size: 10px;
        }

        .clear {
            clear: both;
        }

        .info {
            background-color: #EEE;
            border: 1px solid #DDD;
            color: #999;
        }

        .success {
            background-color: #EFE;
            border: 1px solid #DED;
            color: #9A9;
        }

        .notice {
            background-color: #EFF;
            border: 1px solid #DEE;
            color: #9AA;
        }

        .warning {
            background-color: #FDF7DF;
            border: 1px solid #FEEC6F;
            color: #C9971C;
        }

        .error {
            background-color: #FEE;
            border: 1px solid #EDD;
            color: #A66;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {

            /* Place the timelime to the left */
            .main-timeline-2::after {
                left: 31px;
            }

            /* Full-width containers */
            .timeline-2 {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .timeline-2::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left-2::after,
            .right-2::after {
                left: 18px;
            }

            .left-2::before {
                right: auto;
            }

            /* Make all right containers behave like the left ones */
            .right-2 {
                left: 0%;
            }
        }

        /*
#countdown {
        font-size: 2em;
        color: #950000;
    }

    h1 {
        color: #950000;
        font-weight: bold;
    }

    #countdown div {
        background: rgba(149, 0, 0, 0.1);
        padding: 10px 20px;
        border-radius: 5px;
        border: 2px solid #950000;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
    }

    #countdown div:not(:last-child) {
        margin-right: 10px;
    } */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #950000;
            font-weight: bold;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        #countdown {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
            color: #950000;
        }

        #countdown div {
            padding: 10px 20px;
            border-radius: 5px;
            background: #950000;
            color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #countdown div:hover {
            background: rgba(149, 0, 0, 0.9);
            /* Slightly lighter on hover */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        #countdown div:not(:last-child) {
            margin-right: 10px;
        }

        #countdown span {
            font-weight: bold;
        }
    </style>
    {{-- <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet"> --}}
</head>

<body class="shop-page layout-landing-2">
    @php
        $about = config('about');
        
    @endphp
    <!--header-->

    <header class="header">
        <div class="header-quickLinks js-header-quickLinks d-lg-none">
            <div class="quickLinks-top js-quickLinks-top"></div>
            <div class="js-quickLinks-wrap-m">
            </div>
        </div>
        <div class="header-topline d-none d-lg-flex">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto d-flex align-items-center">
                        {{-- <div class="header-info"><i class="icon-placeholder2"></i>{{ $about['address'] }}
                        </div> --}}
                        <div class="header-phone"><i class="icon-telephone"></i><a
                                href="tel:{{ $about['phone_number'] }}">{{ $about['phone_number'] }}</a></div>
                        <div class="header-info"><i class="icon-black-envelope"></i><a
                                href="mailto:{{ $about['email'] }}">{{ $about['email'] }}</a>
                        </div>
                    </div>
                    <div class="col-auto ml-auto d-flex align-items-center">
                        <span class="header-social d-flex" style="gap: 15px" >
                            <a href="{{ $about['facebook_link'] }}">  <i class="fab fa-facebook-f"></i> </a>

                            <a href="{{$about['twitter_link']}}"> <i class="fab fa-twitter"></i> </a>

                            <a href="mailto:{{$about['email']}}"> <i class="fab fa-google"></i> </a>

                            <a href="{{ $about['instagram_link'] }}"> <i class="fab fa-instagram"></i> </a>

                            <a href="{{ $about['linked_link'] }}"> <i class="fab fa-linkedin-in"></i> </a>

                            <a href="{{ $about['youtupe_link'] }}"> <i class="fab fa-youtube"></i> </a>

                            <a href="https://api.whatsapp.com/send?phone={{ $about['whats_number'] }}&text=السلام عليكم" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                              </a> 
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-content" style="direction: rtl; padding: 15px 0px">
            <div class="container">
                <div class="row align-items-lg-center">
                    <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <div class="col-lg-auto col-lg-2 d-flex align-items-lg-center justify-content-between align-items-center "
                        style="padding: 0px 25px">
                        <a href="{{ route('makeReservation') }}" class="btn btn-primary d-lg-none d-sm-block d-block"
                            style="border-radius: 0px; padding: 3px 5px; margin-right: 20px"><span>حجز موعد</span></a>
                        <a href="index.html" class="header-logo"><img src="{{asset('images/logo.png')}}" alt=""
                            class="img-fluid"></a>
                    </div>
                    <div class="col-lg ml-auto header-nav-wrap">
                        <div class="header-nav js-header-nav">
                            <nav class="navbar navbar-expand-lg btco-hover-menu">
                                <div class="collapse navbar-collapse justify-content-start" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('home') }}"
                                                style="font-weight: 800; opacity: 0.7; ">الرئيسية</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('about-us') }}"
                                                style="font-weight: 800; opacity: 0.7; ">من نحن</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('AskForReport') }}"
                                                style="font-weight: 800; opacity: 0.7; ">طلب تقرير طبي</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('communityService') }}"
                                                style="font-weight: 800; opacity: 0.7; ">خدمة المجتمع</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('blogs') }}"
                                                style="font-weight: 800; opacity: 0.7; ">المقالات
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-inside" href="{{ route('doctors') }}"
                                                style="font-weight: 800; opacity: 0.7; ">الاطباء
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('departments') }}" class="nav-link dropdown-toggle"
                                                data-toggle="dropdown"
                                                style="font-weight: 800 ;opacity: 0.7;;">الاقسام</a>
                                          
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('ourBranches') }}" class="nav-link dropdown-toggle"
                                                data-toggle="dropdown"
                                                style="font-weight: 800 ;opacity: 0.7;;">فروعنا</a>
                                         
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('partners') }}" class="nav-link dropdown-toggle"
                                                data-toggle="dropdown"
                                                style="font-weight: 800 ;opacity: 0.7;;">الشركاء</a>
                                           
                                        </li> --}}
                                      
                                    </ul>
                                </div>
                            </nav>
                        </div>

                    </div>
                    <div>
                        <a href="{{ route('makeReservation') }}"
                            class="btn btn-primary p-0 rounded-2 px-1 d-lg-block d-sm-none d-none "><span>حجز
                                موعد</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div style="background-color: #950000" class="d-md-none" >
        <div class="header-social d-flex justify-content-center" style="gap: 20px; padding: 5px 0px" >
            <a href="{{ $about['facebook_link'] }}">  <i class="fab fa-facebook-f" style="color: white"></i> </a>

            <a href="{{$about['twitter_link']}}"> <i class="fab fa-twitter" style="color: white"></i> </a>

            <a href="mailto:{{$about['email']}}"> <i class="fab fa-google" style="color: white"></i> </a>

            <a href="{{ $about['instagram_link'] }}"> <i class="fab fa-instagram" style="color: white"></i> </a>

            <a href="{{ $about['linked_link'] }}"> <i class="fab fa-linkedin-in" style="color: white"></i> </a>

            <a href="{{ $about['youtupe_link'] }}"> <i class="fab fa-youtube" style="color: white"></i> </a>

            <a href="https://api.whatsapp.com/send?phone={{ $about['whats_number'] }}&text=السلام عليكم" target="_blank">
                <i class="fab fa-whatsapp" style="color: white"></i>
              </a> 
        </div>

    </div>
    @yield('content')
    <div class="footer mt-0" style="direction: rtl;text-align: start">
        <div class="container" style="direction: rtl">
            <div class="row py-1 py-md-2 px-lg-0">
                <div class="col-lg-4 footer-col1">
                    <div class="row flex-column flex-md-row flex-lg-column">
                        <div class="col-md col-lg-auto">
                            <div class="footer-logo">
                                <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="mt-2 mt-lg-0"></div>
                            <div class="footer-social d-none d-md-block d-lg-none">
                                <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                        class="icon-facebook-logo"></i></a>
                                <a href="https://www.twitter.com/" target="blank" class="hovicon"><i
                                        class="icon-twitter-logo"></i></a>
                                <a href="https://plus.google.com/" target="blank" class="hovicon"><i
                                        class="icon-google-logo"></i></a>
                                <a href="https://www.instagram.com/" target="blank" class="hovicon"><i
                                        class="icon-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-md ">
                            <div class=" text-right mt-1 mt-lg-2">
                                <p   >نفخر دائما برعايتك #عيونك_أمانة
                                </p>

                            </div>
                            <div class="footer-social d-md-none d-lg-block">
                                <a href="{{ $about['facebook_link'] }}" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
                                <a href="{{$about['twitter_link']}}" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                                <a href="mailto:{{$about['email']}}" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                                <a href="{{ $about['instagram_link'] }}" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <h3>المدونة</h3>
                    <div class="h-decor"></div>
                    @php
                        // namespace App\Models;
                        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();

                    @endphp
                    @forelse ( $posts as $post )
                        
                    <div class="footer-post d-flex">
                        <div class="footer-post-photo"><img src="{{asset('images/posts')}}/{{$post->image}}"
                                alt="" class="fixed-image-post"></div>
                        <div class="footer-post-text">
                            <div class="footer-post-title"><a href="#">{{$post->title}}</a></div>
                            <p>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</p>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse 
                  
                </div>
                <div class="col-sm-6 col-lg-4" style="direction: rtl">
                    <h3>تواصل معنا</h3>
                    <div class="h-decor"></div>
                    <ul class="icn-list">
                        <li style="direction: rtl">
                            <i class="fas fa-map-marker-alt" style="color: #950000"></i>
                            <a href="{{ route('ourBranches') }} ">
                                <span>توجه لعناوين فروعنا بالمملكة</span>
                                <i class="icon-left-arrow"></i>
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-phone" style="color: #950000"></i>
                            <b>
                                <span class="phone">
                                    <span class="text-nowrap">{{ $about['phone_number'] }}</span>
                                </span>
                            </b>
                        </li>
                        <li>
                            <i class="fas fa-envelope" style="color: #950000"></i>
                            <a href="mailto:{{ $about['email'] }}">{{ $about['email'] }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row text-center text-md-left">
                    <div class="col-sm">جميع الحقوق محفوظة © 2019 <a href="#">بن
                            رشد</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                        <a href="#">Privacy Policy</a>
                    </div>
                    {{-- <div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">For emergency
                            cases&nbsp;&nbsp;&nbsp;</span><i
                            class="icon-telephone"></i>&nbsp;&nbsp;<b>1-800-267-0000</b></div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--//footer-->
    <div class="backToTop js-backToTop">
        <i class="icon icon-up-arrow"></i>
    </div>


    <!-- Vendors -->
    {{-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> --}}
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    {{-- <script src="vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script> --}}
    <script src="{{ asset('vendor/jquery-migrate/jquery-migrate-3.0.1.min.js') }}"></script>
    {{-- <script src="vendor/cookie/jquery.cookie.js"></script> --}}
    <script src="{{ asset('vendor/cookie/jquery.cookie.js') }}"></script>
    {{-- <script src="vendor/bootstrap-datetimepicker/moment.js"></script> --}}
    <script src="{{ asset('vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    {{-- <script src="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script> --}}
    <script src="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    {{-- <script src="vendor/popper/popper.min.js"></script> --}}
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    {{-- <script src="vendor/bootstrap/bootstrap.min.js"></script> --}}
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/sticky.min.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/scroll-with-ease/jquery.scroll-with-ease.min.js') }}"></script>
    <script src="{{ asset('vendor/countTo/jquery.countTo.js') }}"></script>
    <script src="{{ asset('vendor/form-validation/jquery.form.js') }}"></script>
    <script src="{{ asset('vendor/form-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app-shop.js') }}"></script>
    <script src="{{ asset('form/forms.js') }}"></script>

    <link href="{{ asset('vendor/bootstrap/bootstrap.min.js') }}" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the date we're counting down to from the data-deadline attribute
            var countDownDate = new Date(document.getElementById("countdown").getAttribute("data-deadline"))
                .getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "OFFER EXPIRED";
                }
            }, 1000);
        });
        $('#carouselExampleSlidesOnly').slick();
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('.delete-form');

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to delete?',
                buttons: {
                    confirm: function() {
                        form.submit();
                    },
                    cancel: function() {
                        // close the dialog
                    }
                }
            });
        });
    });

        
    </script>

</body>

</html>
