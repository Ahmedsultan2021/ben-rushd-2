@extends('master')
@section('content')
    <div class="my-5">
        <!--section-->
        <div class="section page-content-first">
            <div class="container">
                <div class="text-center mb-2  mb-md-3 mb-lg-4">
                    <div class="h-sub theme-color"  >فريقنا الطبي</div>
                    <h1>الأطباء المتخصصون</h1>
                    <div class="h-decor"></div>
                </div>
            </div>
            <div class="container">
                <div class="text-center mb-2 mb-md-3">
                    <p>مركز بن رشد: احترافية وجودة في الخدمة الطبية. أطباء ممتازون وتقنيات حديثة. رعاية شاملة واهتمام بصحة المرضى</p>
                </div>
                <div class="filters-by-category mb-2">
                    <ul class="option-set justify-content-center" data-option-key="filter">
                        <li><a href="#filter" data-option-value="*" class="selected">All</a></li>
                        @foreach ($distinctDepartmentNames as $name)
                        <!-- Using the slug function to create a CSS-friendly class name -->
                        <li><a href="#filter" data-option-value=".{{ \Illuminate\Support\Str::slug($name) }}">{{ $name }}</a></li>
                    @endforeach
                    </ul>
                </div>

                <div class="gallery-specialist gallery-isotope " id="gallery-specialist">
                    <div class="d-flex">

                        @foreach ( $doctors as $doctor )  
                            <div   class= "gallery-item my-3 gallery-item-width   @foreach($doctor->departments as $department){{ \Illuminate\Support\Str::slug($department->name) }} @endforeach"> 
                                 <div class="doctor-box text-center mr-1 m-md-0">
                                    <div class="">
                                        <a href="{{ route('doctor',["id"=>$doctor->id]) }}"><img src="{{ asset('images/doctors/' . $doctor->image) }}"
                                                class="fixed-size-image" alt=""></a>
                                    </div>
                                    <h5 class="doctor-box-name"><a href="{{ route('doctor',["id"=>$doctor->id]) }}" style="text-align: start; direction: rtl"> دكتور/ {{$doctor->fname}} {{$doctor->lname}} </a></h5>
                                    <div class="doctor-box-position">{{$doctor->Speciality}}</div>
                                    <div class="doctor-box-tex text-start" style="direction: rtl">
                                        <p>{{ Str::limit($doctor->brief, $limit = 100, $end = '...') }}</p>
                                    </div>
                                    <div class="doctor-box-bottom justify-content-center flex-row" style="gap: 2px" >
                                        @foreach ( $doctor->branches as $branch )
                                        <span class="badge">{{$branch->name}} </span>
                                        @endforeach
                                    </div>
                                </div> 
                            </div>
                            @endforeach
                    </div>
                    </div>
                   
            </div>
        </div>
        <div class="section my-5">
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1">Specialist Dental Practice</h2>
					<div class="h-decor"></div>
				</div>
				<div class="text-center">
					<p class="max-900">Our dentists are committed to improving your general dental health and restoring your smile. We are a specialist dental practice also offering the best and most affordable dental implants for your oral health and rehabilitation. Make a FREE dental implants consultation and assessment for a personal treatment plan and meet our friendly and professional staff.</p>
					<a href="#" class="btn mt-3" data-toggle="modal" data-target="#modalBookingForm"><i class="icon-right-arrow"></i><span>Booking a visit</span><i class="icon-right-arrow"></i></a>
				</div>
			</div>
		</div>
    </div>
@endsection
