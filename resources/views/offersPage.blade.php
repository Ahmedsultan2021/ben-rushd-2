@extends('master')
@section('content')
<div class="my-5" >

    
    <div class="page-content" style="direction: rtl; text-align: start">
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <h1>Offer Countdown</h1>
                    <div id="countdown"   data-deadline="{{$endTime}}" class="d-flex justify-content-center flex-wrap ">
                        <div class="mr-3 mb-1">
                            <span id="days"></span> Days
                        </div>
                        <div class="mr-3 mb-1">
                            <span id="hours"></span> Hours
                        </div>
                        <div class="mr-3 mb-1">
                            <span id="minutes"></span> Minutes
                        </div>
                        <div class="mr-3 mb-1">
                            <span id="seconds"></span> Seconds
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mt-5" >
                    {{-- {{$offer->description}} --}}
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md col-lg-5">
                        <div class="pr-0 pr-lg-8">
                            <div class="title-wrap">
                                <h1> {{$offer->title}} 
                                </h1>
                                    <h2> عرض خاص ولفترة محدودة </h2>
                                <div class="h-decor"></div>
                            </div>
                            <div class="mt-2 mt-lg-4">
                                <p>العرض فقط للاعمار من 18 الى 40</p>
                                <p>تطبق الشروط والأحكام  |  سياسة الخصوصية</p>
                                <p class="p-sm">Fields marked with a * are required.</p>
                            </div>
                            <div class="mt-2 mt-md-5"></div>
                            <h5>Stay Connected</h5>
                            <div class="content-social mt-15">
                                <a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
                                <a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                                <a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                                <a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md col-lg-6 mt-4 mt-md-0">
                        @if (session('success'))
                        <label>
                            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                            <div class="alert success">
                              <span class="alertText"> {{ session('success') }}

                              <br class="clear"/></span>
                            </div>
                          </label>
                        @endif
  
                        
                        <form class="contact-form" method="post" novalidate="novalidate" action="{{route('reservation.store')}}">
                            @csrf

                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="customerName" placeholder="*اسمك" value="{{ old('customerName') }}">
                                @error('customerName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                
                            </div>
                       
                            <div class="mt-15">
                                <input type="text" class="form-control" name="phone" placeholder="*الجوال" value="{{old('phone')}}">
                                   @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-15">
                                <input type="email" class="form-control" name="email" placeholder="ادخل البريد الالكتروني*" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                <input type="hidden" class="form-control" name="isOffer" value="1">
                                <input type="hidden" class="form-control" name="offer_id" value="{{$offer->id}}">
                            <div class="mt-15">
                                <select class="form-control" name="branch_id" aria-label="Default select example">
                                    <option value="" {{ old('branch_id') ? '' : 'selected' }}>اختر الفرع</option>
                                    @foreach ($branches as $name => $id)
                                        <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            
                                @error('branch_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mt-3">
                                <button type="submit" class="btn btn-hover-fill"> <i class="icon-left-arrow"></i>  <span>إرسال</span> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="section" >
            <img src="{{ asset('images/offers') }}/{{ $offer->image }}"width="70%" class="d-block m-auto" alt="">
        </section>
    </div>
    
</div>
@endsection