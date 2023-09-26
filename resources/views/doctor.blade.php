@extends('master')
@section('content')
    <div class="my-5" dir="rtl" style="text-align: start">
        <!--section-->
        <div class="section page-content-first">
            <div class="container mt-6">
                <div class="row">
                    <div class="col-md">
                        <div class="doctor-page-photo text-center">
                            <img src="{{ asset('images/doctors/' . $doctor->image) }}" class="fixed-image-doctor" alt="">
                        </div>
                        <div class="mt-3 mt-md-5"></div>
                        <table class="table doctor-page-table">
                            <tr>
                                <td>التخصص</td>
                                <td>{{$doctor->Speciality}}</td>
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
                        </table>
                    </div>
                    <div class="col-lg-8 mt-4 mt-lg-0">
                        <div class="doctor-info mb-3 mb-lg-4">
                            <div class="doctor-info-name">
                                <h3>دكتور {{$doctor->fname}} {{$doctor->lname}}</h3>
                                <h6>{{$doctor->Speciality}}</h6>
                            </div>
                            <div class="doctor-info-phone"> <a name="" id="" class="btn btn-primary rounded-0" style="padding: 0px 20px" href="#" role="button">حجز موعد</a> </div>
                            <div class="doctor-info-social">
                                <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                        class="icon-facebook-logo"></i></a>
                                <a href="mailto:info@dentco.net" class="hovicon"><i class="icon-black-envelope"></i></a>
                            </div>
                        </div>
                        <p>{{$doctor->brief}}</p>
                       
                        <ul class="marker-list-md">
                            <li><i>Member of the Royal College of Surgeons of USA</i></li>
                            <li><i>Member of the General Dental Council (USA)</i></li>
                        </ul>
                        <div class="mt-4 mt-lg-6"></div>
                        <div class="collapse-wrap d-flex" data-toggle="collapse" data-target="#tab1">
                            <h5 class="collapse-title">Dental Treatments of <span class="theme-color text-nowrap">Dr.
                                    Bigham</span></h5>
                            <div class="ml-auto"><i class="icon-bottom"></i></div>
                        </div>
                        <div id="tab1" class="collapse show">
                            <div class="pb-4 pb-lg-6">
                                <div class="row row-sm-space pt-2">
                                    <div class="col-sm-4"><img src="images/content/doctor-page-portfolio-1.jpg"
                                            class="img-fluid" alt=""></div>
                                    <div class="col-sm-4"><img src="images/content/doctor-page-portfolio-2.jpg"
                                            class="img-fluid" alt=""></div>
                                    <div class="col-sm-4"><img src="images/content/doctor-page-portfolio-3.jpg"
                                            class="img-fluid" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse-wrap d-flex" data-toggle="collapse" data-target="#tab2">
                            <h5 class="collapse-title">What Patients Say</h5>
                            <div class="ml-auto"><i class="icon-bottom"></i></div>
                        </div>
                        <div id="tab2" class="collapse show">
                            <div class="pb-4">
                                <div class="doctor-review-row mb-1">
                                    <div class="star-rating"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i></span></div>
                                    <div class="testimonial-author"><span class="testimonial-name">- Wilmer
                                            Stevenson,</span> <span class="testimonial-position">Creative manager</span>
                                    </div>
                                </div>
                                <p>When asked what makes dentistry so rewarding, he said "My job is rewarding because
                                    sometimes even the simplest treatment can change the patient's confidence in
                                    himself/herself and I feel that I am part of a larger global healthcare promotion
                                    program."</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-sm-row mt-lg-2">
                            <a href="#" class="btn" data-toggle="modal" data-target="#modalBookingForm"><i
                                    class="icon-right-arrow"></i><span>Book Consultation</span><i
                                    class="icon-right-arrow"></i></a>
                            <a href="schedule.html" class="btn "><i class="icon-right-arrow"></i><span>Timetable</span><i
                                    class="icon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section-->
        {{-- <div class="section mt-5">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1">Our Spesialists</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row specialist-carousel js-specialist-carousel">
                    <div class="col-sm-6 col-md-4">
                        <div class="doctor-box text-center">
                            <div class="doctor-box-photo">
                                <a href="doctor-page.html"><img src="{{ asset('images/doctors/8.png') }}" class="img-fluid"
                                        alt=""></a>
                            </div>
                            <h5 class="doctor-box-name"><a href="doctor-page.html">Dr. William Gardner</a></h5>
                            <div class="doctor-box-position">Implantologist</div>
                            <div class="doctor-box-text">
                                <p>Dr William Gardner completed her undergraduate dental degree at the University of Western
                                    Australia in 2003</p>
                            </div>
                            <div class="doctor-box-bottom">
                                <div class="doctor-box-phone"><i class="icon-telephone"></i><a
                                        href="tel:+1-212-857-8103">+1-212-857-8103</a></div>
                                <div class="doctor-box-social">
                                    <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                            class="icon-facebook-logo"></i></a>
                                    <a href="mailto:info@dentco.net" class="hovicon"><i
                                            class="icon-black-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="doctor-box text-center">
                            <div class="doctor-box-photo">
                                <a href="doctor-page.html"><img src="{{ asset('images/doctors/9.png') }}"
                                        class="img-fluid" alt=""></a>
                            </div>
                            <h5 class="doctor-box-name"><a href="doctor-page.html">Dr. Mayra Hastings</a></h5>
                            <div class="doctor-box-position">Orthodontist</div>
                            <div class="doctor-box-text">
                                <p>With years of experience she prides herself on providing minimally invasive periodontal
                                    care for patients</p>
                            </div>
                            <div class="doctor-box-bottom">
                                <div class="doctor-box-phone"><i class="icon-telephone"></i><a
                                        href="tel:+1-816-941-7259">+1-816-941-7259</a></div>
                                <div class="doctor-box-social">
                                    <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                            class="icon-facebook-logo"></i></a>
                                    <a href="mailto:info@dentco.net" class="hovicon"><i
                                            class="icon-black-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="doctor-box text-center">
                            <div class="doctor-box-photo">
                                <a href="doctor-page.html"><img src="{{ asset('images/doctors/3.png') }}"
                                        class="img-fluid" alt=""></a>
                            </div>
                            <h5 class="doctor-box-name"><a href="doctor-page.html">Dr. Billy Logan</a></h5>
                            <div class="doctor-box-position">Cosmetic Dentist</div>
                            <div class="doctor-box-text">
                                <p>Working over the past 18 years in both private practice and teaching at the universities
                                    inspired an interest in Oral Medicine </p>
                            </div>
                            <div class="doctor-box-bottom">
                                <div class="doctor-box-phone"><i class="icon-telephone"></i><a
                                        href="tel:+1-262-374-3970">+1-262-374-3970</a></div>
                                <div class="doctor-box-social">
                                    <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                            class="icon-facebook-logo"></i></a>
                                    <a href="mailto:info@dentco.net" class="hovicon"><i
                                            class="icon-black-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="doctor-box text-center">
                            <div class="doctor-box-photo">
                                <a href="doctor-page.html"><img src="{{ asset('images/doctors/2.png') }}"
                                        class="img-fluid" alt=""></a>
                            </div>
                            <h5 class="doctor-box-name"><a href="doctor-page.html">Dr. Jennifer Foster</a></h5>
                            <div class="doctor-box-position">Oral Health Therapist</div>
                            <div class="doctor-box-text">
                                <p>Dr. Jennifer Foster has been in practice for almost 20 years graduating BDS from the
                                    University of Manchester, UK in 1997</p>
                            </div>
                            <div class="doctor-box-bottom">
                                <div class="doctor-box-phone"><i class="icon-telephone"></i><a
                                        href="tel:+1-219-756-6567">1-219-756-6567</a></div>
                                <div class="doctor-box-social">
                                    <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                            class="icon-facebook-logo"></i></a>
                                    <a href="mailto:info@dentco.net" class="hovicon"><i
                                            class="icon-black-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         --}}
    </div>

    </div>
@endsection
