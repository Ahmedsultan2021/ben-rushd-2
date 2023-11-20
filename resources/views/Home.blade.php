@extends('master')
@section('content')
    <div class="page-content">
        <div class="section mt-0">
            <div id="carouselExampleSlidesOnly" style="margin: 0px;width: 100%;min-height: 150px;max-height: 600px ;" class="carousel slide" data-ride="carousel">
                @foreach ($offers as $offer)
                    <div class="carousel-inner">
                        <a href="{{ route('offersPage', ['id' => $offer->id]) }}">
                            <div class="carousel-item">
                                <img class="d-block w-100" style="width: 100%;min-height: 150px;max-height: 600px ;"  src="{{ asset('images/offers') }}/{{ $offer->image }}"
                                    alt="First slide">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section mt-0 bg-primary text-white">
            <div class="container ">
                <div class="promo-text">
                    <div class="row d-flex flex-wrap justify-content-center">

                        <div class="col-md-3 d-flex  flex-wrap flex-column justify-content-between my-3">
                            <div class="h1 text-white">
                                فروعنا
                                <h3 class=" text-white"> تعرف على كل الفروع </h3>


                            </div>
                            <div>
                                <a href="{{route('ourBranches')}}">
                                    <button type="button" class="btn btn-outline-light btnsec1"
                                    style="border-color: white; border-radius: 0px; ">
                                    < البحث عن أقرب فرع </button>
                                </a> 
                                </div>
                        </div>

                        <div class="line-container">

                            <div class="vertical-line "></div>
                        </div>
                        <div class="col-md-4 d-flex flex-column justify-content-between my-3">
                            <div>
                                <div class="h1 text-white"> العروض الحالية

                                    <h3 class=" text-white"> تعرف على العروض المقدمة</h3>
                                </div>
                            </div>
                            <div>
                                <a href="#">

                                    <button type="button" class="btn btn-outline-light btnsec1"
                                    style="border-color: white; border-radius: 0px; ">
                                    < المزيد</button>
                                </a>
                            </div>
                        </div>
                        {{-- <hr class="vertical-line"> --}}

                        {{-- <hr class="vertical-line"> --}}
                        <div class="line-container">

                            <div class="vertical-line "></div>
                        </div>
                        <div class="col-md-4 d-flex  flex-wrap flex-column justify-content-between my-3 ">
                            <div class="h1 text-white"> أطباؤنا

                                <h3 class="text-white">إختر طبيبك بالإسم أو بالتخصص
                                </h3>
                            </div>
                            <a href="{{route('doctors')}}">

                                <div> <button type="button" class="btn btn-outline-light btnsec1"
                                    style="border-color: white; border-radius: 0px; ">
                                    < ابحث عن طبيبك</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <div class="container" style="direction: rtl; text-align: start">
                <div class="row my-5">
                    <div class="col-md-6 my-5z">
                        <h1 style="color: #950000;animation: none">عن المركز</h1>
                        <h3 style="color: #950000" class="">بدايتنا</h3>
                        {{ $about['description'] }}
                    </div>
                    <div class="col-md-6 my-3">
                        <img src="{{ asset('images') }}/{{ $about['image'] }}" style="width: 100%"
                            alt="{{ asset('images') }}/ {{ $about['image'] }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="section " id="aboutSection">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1">مركز بن رشد الطبي للعيون<br>
                         <span class="theme-color">الفروع ومواعيد العمل</span></h2>
                </div>
                <div class="nav nav-pills-simple font-weight-bold"  role="tablist" style="direction: rtl">
                    @foreach ($branches as $branch)
                        <a class="nav-link font-weight-bold {{ $loop->first ? 'active' : '' }}" data-toggle="pill"
                            href="#tab-{{ $branch->id }}" role="tab" style="font-size: 2rem">
                            {{ $branch->name }}
                        </a>
                    @endforeach
                </div>
                <div id="tab-content" class="tab-content my-2 my-sm-4">
                    <div id="tab-content" class="tab-content my-2 mt-sm-4">
                        @foreach ($branches as $branch)
                            <div id="tab-{{ $branch->id }}"
                                class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" role="tabpanel"
                                role="tabpanel">
                                <div class="tab-bg"><img src="images/content/bg-map.png" alt=""></div>
                                <div class="row">
                                    <div class="col-md-6 h-100 mb-2 mb-md-0">
                                        <img src="{{ asset('images/branches') }}/{{ $branch->image }}"
                                            alt="Product Image" class="fixed-size">
                                        <a href="#" class="video-btn-circle js-video-btn" data-toggle="modal"
                                            data-src="https://www.youtube.com/embed/uyWt48mWmz0"
                                            data-target="#videoModal">
                                            <span><i class="icon-play"></i></span>
                                        </a>
                                        <!-- Video Modal -->
                                        <div class="modal fade" id="videoModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item video" src=""
                                                                allowscriptaccess="always" allow="autoplay"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //Video Modal -->
                                    </div>
                                    <div class="col-md-6 " style="direction: rtl; text-align: right">
                                        <div class="pt-xl-1" style="direction: rtl; text-align: right">
                                            <p style="font-weight: 800" >{!! Str::limit($branch->brief, 300) !!}</p>
                                            <h3 style="color: #950000">مواعيد العمل</h3>
                                            @php
                                                $branch->worktimes = json_decode($branch->worktimes, true);
                                                $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                                $daysArabic = ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
                                            @endphp
                                            <table style="width: 100%; border-collapse: collapse;">
                                                @foreach ($days as $index => $day)
                                                    <tr style="border-bottom: 1px solid #ddd;">
                                                        <td style="padding: 8px; color: #950000;">{{ $daysArabic[$index] }}</td>
                                                        <td style="padding: 8px;">{{ $branch->worktimes["$day"] }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>


        <div class="section bg-grey mt-0" id="servicesSection">
            <div class="container">
                <div class="title-wrap text-center text-md-right mr-md-5">
                    <h2 class="h1 " data-title="Our Services"><span>نقدم لكم بعناية <span
                                class="theme-color">خدماتنا</span></span></h2>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row js-services-tabs-carousel">
                            @foreach ($departments as $department)
                                <div class="col-md-6 col-lg-4">
                                    <div class="service-card-style3 " style="direction: rtl;text-align: start">
                                        <div class="service-card-icon">
                                            <i class="icon-eye-1"></i>
                                        </div>
                                        <h5 class="service-card-name">{{ $department->name }}</h5>
                                        <p style="direction: rtl; text-align: start"> {!! Str::limit(strip_tags($department->brief), 70) !!}</p>
                                        <div class="mt-2 mt-md-4"></div>
                                        <a href="{{ route('makeReservation') }}" class="btn-link">حجز موعد الأن
                                            <i class="icon-left-arrow"></i></a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-3 service-info-carousel-wrap">
                        <div class="service-info-carousel js-services-info">
                            @foreach ($departments as $department)
                                <div class="service-info">

                                    <div class="service-info-num"><span> {{ $loop->iteration }}
                                        </span>/{{ count($departments) }} </div>
                                    <p style="direction: rtl; text-align: right">{!! Str::limit(strip_tags($department->brief), 200) !!}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section  services-->
        <!--section-->
     
      
        <div class="section bg-grey py-0 "   id="faqSection">
            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    
                    <div class="col-xl-6 banner-left bg-cover"
                        style="background-image: url('{{ asset('images') }}/{{ $about['image'] }}')"></div>
                    <div class="col-xl-6">
                        <div class="faq-wrap faq-wrap--pad-lg px-15 px-lg-8">
                            <div class="title-wrap text-right" >
                                <h2 class="h1">الاعتمادات والانجازات</h2>
                            </div>
                            <div class="mt-2 mt-lg-4"></div>
                            <div class="faq-item" dir="rtl" >
                                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem1"
                                    aria-expanded="true"><span style="padding: 0px 10px 0px 20px">  أول مركز في العالم تجرى فيه عملية Femto Epith Ingrowth Removal. 
                                    </span></a>
                                <div id="faqItem1" class="collapse  faq-item-content" role="tabpanel">
                                    <div>
                                        <p>If you would like to make an appointment with one of our practitioners, please
                                            contact our reception staff. Alternatively you may book your appointments
                                            online. Every effort will be made to accommodate your preferred time and choice
                                            of practitioner. </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="faq-item" dir="rtl" >
                                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem2"
                                    aria-expanded="true"><span style="padding: 0px 10px 0px 20px"> أول مركز في الشرق الأوسط تجرى فيه عملية زراعة القرنية LKP بالتخدير السطحي.
 
                                    </span></a>
                                <div id="faqItem2" class="collapse  faq-item-content" role="tabpanel">
                                    <div>
                                        <p>If you would like to make an appointment with one of our practitioners, please
                                            contact our reception staff. Alternatively you may book your appointments
                                            online. Every effort will be made to accommodate your preferred time and choice
                                            of practitioner. </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="faq-item" dir="rtl" >
                                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem3"
                                    aria-expanded="true"><span style="padding: 0px 10px 0px 20px"> أول مركز في المملكة تجرى فيه عملية زراعة القزحية.
 
                                    </span></a>
                                <div id="faqItem3" class="collapse  faq-item-content" role="tabpanel">
                                    <div>
                                        <p>If you would like to make an appointment with one of our practitioners, please
                                            contact our reception staff. Alternatively you may book your appointments
                                            online. Every effort will be made to accommodate your preferred time and choice
                                            of practitioner. </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="faq-item" dir="rtl" >
                                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4"
                                    aria-expanded="true"><span style="padding: 0px 10px 0px 20px">  أول مركز في الرياض تجرى فيه زراعة الطبقة المبطنة للقرنية.
 
                                    </span></a>
                                <div id="faqItem4" class="collapse  faq-item-content" role="tabpanel">
                                    <div>
                                        <p>If you would like to make an appointment with one of our practitioners, please
                                            contact our reception staff. Alternatively you may book your appointments
                                            online. Every effort will be made to accommodate your preferred time and choice
                                            of practitioner. </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="faq-item" dir="rtl" >
                                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem5"
                                    aria-expanded="true"><span style="padding: 0px 10px 0px 20px">  أكثر مركز خاص تجرى فيه زراعة العدسات المتقدمة بعد إزالة الماء الأبيض.

 
                                    </span></a>
                                <div id="faqItem5" class="collapse  faq-item-content" role="tabpanel">
                                    <div>
                                        <p>If you would like to make an appointment with one of our practitioners, please
                                            contact our reception staff. Alternatively you may book your appointments
                                            online. Every effort will be made to accommodate your preferred time and choice
                                            of practitioner. </p>
                                    </div>
                                </div>
                            </div>
        
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section faq-->
        <!--section specialists-->
        <div class="section mb-5" id="specialistsSection">
            <div class="container">
                <div class="title-wrap text-center">
                    <div class="h-sub theme-color">فريقنا المحترف</div>
                    <h2 class="h1 title-with-clone" data-title="Specialists">اطباؤنا المتخصصون</h2>
                    <div class="h-decor"></div>
                </div>
                {{-- <form action="#" class="content-search d-flex">
                    <div class="input-wrap">
                        <input type="text" class="form-control" placeholder="Search for specialist">
                    </div>
                    <button type="submit"><i class="icon-search"></i></button>
                </form> --}}
                <div class="mt-3 mt-lg-5"></div>
                <div class="row specialist-carousel2 js-specialist-carousel2">
                    @foreach ( $doctors as $doctor )
                    @if ($loop->index < 4)

                    <div class="doctor-box-h-wrap">
                        <div class="doctor-box-h">
                            <div class="doctor-box-h-photo">
                                <img src="{{ asset('images/doctors/' . $doctor->image) }}"
                                alt="" style="width: -webkit-fill-available" >
                                </div>
                            <div class="doctor-box-h-info" dir="rtl" style="text-align: right" >
                                <h5 class="doctor-box-h-name">الدكتور / {{$doctor->fname}} {{$doctor->lname}} </h5>
                                <table class="table doctor-box-h-table">
                                    <tbody>
                                        <tr>
                                            <td>التخصص:</td>
                                            <td> {{$doctor->Speciality}}</td>
                                        </tr>
                                        @foreach ( $doctor->branches as $branch )
                                        {{-- <span class="badge">{{$branch->name}} </span> --}}
                                        <tr>
                                            @if ($loop->iteration == 1)
                                                
                                            <td>الفروع:</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$branch->name}} </td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td></td>
                                            <td>Laser Eye Surgery</td>
                                        </tr> --}}
                                        <tr>
                                            <td>سنوات الخبرة</td>
                                            <td>20 عام من الخبر</td>
                                        </tr>
                                        @foreach ( $doctor->departments as $branch )
                                        {{-- <span class="badge">{{$branch->name}} </span> --}}
                                        <tr>
                                            @if ($loop->iteration == 1)
                                                
                                            <td>الاقسام:</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$branch->name}} </td>
                                        </tr>
                                        @endforeach
                                        @foreach ( json_decode($doctor->experience, true) as $experience )
                                        {{-- <span class="badge">{{$branch->name}} </span> --}}
                                        <tr>
                                            @if ($loop->iteration == 1)
                                                
                                            <td>الخبرات:</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$experience}} </td>
                                        </tr>
                                        @endforeach
                                        @foreach ( json_decode($doctor->qualifications , true) as $qualifications )
                                        {{-- <span class="badge">{{$branch->name}} </span> --}}
                                        <tr>
                                            @if ($loop->iteration == 1)
                                                
                                            <td>المؤهلات:</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$qualifications}} </td>
                                        </tr>
                                        @endforeach
                                     
                               
                                      
                                    </tbody>
                                </table>
                                <div class="doctor-box-h-booking">
                                    <a href="{{route('makeReservation')}}" class="btn" 
                                        ><span>حجز موعد</span><i class="icon-left-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
         
                </div>
            </div>
        </div>
        <!--//section specialists-->
        <!--section testimonials-->
        {{-- <div class="section bg-cover" id="testimonialsSection">
            <div class="container-fluid px-0">
                <div class="reviews-style3-wrap">
                    <div class="reviews-left" style="background-image: url(images/content/testimonials-left.png)"></div>
                    <div class="reviews-style3" style="background-image: url(images/content/bg-map.png)">
                        <div class="title-wrap text-center">
                            <div class="reviews-title-icon">“</div>
                            <h2 class="h1 reviews-title" data-title="Testimonials">Clinic Testimonials</h2>
                        </div>
                        <div class="js-reviews-carousel2 reviews-carousel">
                            <div class="review">
                                <p class="review-text">I would like to give you a special 'Thank You' to all of you for the
                                    care
                                    you've given. You were special to a part of our lives for the year we knew you all. You
                                    were
                                    very caring. Nurses like you are never forgotten. I just can't thank you enough.</p>
                                <p><span class="review-author">- Joseph Dunbar,</span> <span
                                        class="review-author-position">Carpenter</span>
                                </p>
                            </div>
                            <div class="review">
                                <p class="review-text">Today is my last day of infusion. But I know I will be back …not as
                                    a
                                    patient but a visitor. I have only positive things to say about the nurses at MedEra
                                    here in
                                    infusion and also on the 4th Floor.</p>
                                <p><span class="review-author">- Steven Roa,</span> <span
                                        class="review-author-position">Businesswoman</span>
                                </p>
                            </div>
                            <div class="review">
                                <p class="review-text">Am very impressed with you all as well as being highly proficient is
                                    absolutely adorable. I feel so relaxed in her capable hands and hope to be her patient
                                    for a
                                    very long time! You are a fantastic team!!!</p>
                                <p><span class="review-author">- Wilmer Stevenson,</span> <span
                                        class="review-author-position">Creative manager</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="reviews-right" style="background-image: url(images/content/testimonials-right.png)"></div>
                </div>
            </div>
        </div> --}}
        <!--//section testimonials-->
        <!--section events-->
        {{-- <div class="section" id="eventsSection">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1">Clinic Events</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row blog-grid-full blog-grid-carousel-full js-blog-grid-carousel-full mt-lg-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-01.jpg" alt="">
                            </div>
                            <div class="post-date-bg">Apr 16, 2019</div>
                            <h2 class="post-title">The causes of acquired 3rd nerve palsy</h2>
                            <div class="post-teaser">Among all cases of ocular misalignment from cranial nerve palsies,
                                third nerve palsies are the most worrisome.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-02.jpg" alt="">
                            </div>
                            <div class="post-date-bg">Mar 25, 2019</div>
                            <h2 class="post-title">Dry eye can affect more than the eye</h2>
                            <div class="post-teaser">Dry eye can significantly lower people's quality of life, a new study
                                says. Some have a hard time performing.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-03.jpg" alt="">
                            </div>
                            <div class="post-date-bg">May 5, 2019</div>
                            <h2 class="post-title">Laser pointers are still not toys</h2>
                            <div class="post-teaser">A boy from Greece lost much of the vision in one eye after looking
                                directly at the light from a laser pointer.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-01.jpg" alt="">
                            </div>
                            <div class="post-date-bg">Apr 16, 2019</div>
                            <h2 class="post-title">The causes of acquired 3rd nerve palsy</h2>
                            <div class="post-teaser">Among all cases of ocular misalignment from cranial nerve palsies,
                                third nerve palsies are the most worrisome.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-02.jpg" alt="">
                            </div>
                            <div class="post-date-bg">Mar 25, 2019</div>
                            <h2 class="post-title">Dry eye can affect more than the eye</h2>
                            <div class="post-teaser">Dry eye can significantly lower people's quality of life, a new study
                                says. Some have a hard time performing.</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post blog-post-style3">
                            <div class="post-image">
                                <img src="images/content/news-03.jpg" alt="">
                            </div>
                            <div class="post-date-bg">May 5, 2019</div>
                            <h2 class="post-title">Laser pointers are still not toys</h2>
                            <div class="post-teaser">A boy from Greece lost much of the vision in one eye after looking
                                directly at the light from a laser pointer.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--//section events-->
        <!--section banner-->
        {{-- <div class="section">
            <div class="container-fluid px-0">
                <div class="banner-center bg-cover" style="background-image: url(images/content/banner-center.jpg)">
                    <div class="banner-center-caption text-center">
                        <div class="banner-center-text1-1">Online Appointments & Prescriptions</div>
                        <div class="banner-center-text5 max-450-md">You can now book a limited amount of doctors’
                            appointments online
                        </div>
                        <a href="#specialistsSection" class="btn mt-2 mt-sm-3 mt-lg-5"><i
                                class="icon-right-arrow"></i><span>Doctor Timetable</span><i
                                class="icon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--//section banner-->
        <!--section contact-->
        {{-- <div class="section" id="contactSection">
            <div class="banner-contact-us" style="background-image: url(images/content/contact-bg.png)">
                <div class="container">
                    <div class="row no-gutters">
                        <div
                            class="col-sm-6 col-lg-6 order-2 order-sm-2 mt-3 mt-md-0 text-center text-md-right d-flex align-items-end">
                            <img src="images/content/banner-callus.png" alt="" class="shift-right">
                        </div>
                        <div class="col-sm-6 col-lg-6 order-1 order-sm-1 d-flex">
                            <div class="pt-2 pt-lg-6 pr-lg-3 text-center">
                                <h2 class="title-left" data-title="Looking for a Doctor?"><span>Looking for <br
                                            class="d-xl-none"> a <span class="theme-color">Certified Doctor?</span></span>
                                </h2>
                                <p>We believe in providing the best possible care to all our existing patients and welcome
                                    new patients to sample.</p>
                                <form class="contact-form" id="contactForm" method="post" novalidate="novalidate">
                                    <div class="successform">
                                        <p>Your message was sent successfully!</p>
                                    </div>
                                    <div class="errorform">
                                        <p>Something went wrong, try refreshing and submitting the form again.</p>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Your name*">
                                    </div>
                                    <div class="row row-sm-space mt-15">
                                        <div class="col-sm-6"><input type="text" class="form-control" name="phone"
                                                placeholder="Your Phone"></div>
                                        <div class="col-sm-6 mt-15 mt-sm-0"><input type="text" class="form-control"
                                                name="email" placeholder="Email*"></div>
                                    </div>
                                    <div class="mt-15">
                                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="text-left mt-1">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Sign me up to the email list</span>
                                        </label>
                                    </div>
                                    <div class="mt-2 mt-lg-4">
                                        <button type="submit" class="btn"><i class="icon-right-arrow"></i><span>Send
                                                request</span><i class="icon-right-arrow"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--//section contact-->
    </div>
@endsection
