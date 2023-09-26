@extends('master')
@section('content')
    <div class="page-content">
      
        <div class="mt-2">
            <div class="container" style="direction: rtl; text-align: start">
                <div class="row my-5">
                    <div class="col-md-6">
                        <h1 style="color: #950000;animation: none">عن المركز</h1>
                        <h3 style="color: #950000">بدايتنا</h3>
                        {{ $about['description'] }}
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images') }}/{{ $about['image'] }}" style="width: 100%"
                            alt="{{ asset('images') }}/ {{ $about['image'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mb-5">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub theme-color">شركة بن رشد التخصصي للعيون</div>
                <h2 class="h1">أهدافنا واضحة</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left"
                data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}]}'>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-simple"><i class="icon-innovation"></i></div>
                        <div>
                            <h5 class="icn-text-title">الرؤية</h5>
                            <p>أن تكون شركة بن رشد الطبية هي الخيار الأول والمتميز في الرعاية الصحية في مجال طب و جراحة
                                العيون و نتطلع الى أن تكون أفضل منظومة للرعاية الصحية للعيون في المملكة العربية السعودية.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-simple"><i class="icon-compassion"></i></div>
                        <div>
                            <h5 class="icn-text-title">الرسالة</h5>
                            <p>تلتزم شركة بن رشد التخصصي للعيون بتوفير التميز في خدمات الرعاية الصحية في كل ما يخص مجال طب و
                                جراحة العيون وفقاً لأعلى المعايير والمواصفات.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="section my-5">
        <div class="container-fluid px-0">
            <div class="banner-center bg-cover" style="background-image: url({{ asset('images') }}/{{ $about['image'] }})">
                <div class="banner-center-caption text-center">
                    <div class="banner-center-text1">احصل على الخدمة التى تستحقها</div>
                    <div class="banner-center-text2"> عيونك_أمانة#</div>
                    <a href="{{ route('makeReservation') }}" class="btn btn-white mt-5"><i
                            class="icon-right-arrow"></i><span>حجز موعد</span><i class="icon-right-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
