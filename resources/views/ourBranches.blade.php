@extends('master')
@section('content')
<div class="page-content my-5">
    <!--section-->
  
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container">
            <div class="text-center mb-2  mb-md-3 mb-lg-4">
                <div class="h-sub theme-color">نتشرف بخدمتكم</div>
                <h1>فروعنا</h1>
                <div class="h-decor"></div>
                <div class="text-center mt-4">

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row col-equalH justify-content-center">
                @foreach ( $branches as $branch )
                <div class="col-md-6 col-lg-4">
                    <div class="service-card" dir="rtl" style="text-align: right">
                        <div class="service-card-photo">
                              <img src="{{asset('images/branches')}}/{{$branch->image}}" width="100%" class="fixed-image-size" alt="Product Image"
                                class="">
                        </div>
                        <h5 class="service-card-name">{{$branch->name}}</h5>
                        <div class="h-decor"></div>
                        <p>{{Str::limit($branch->brief , 150, '...') }}.</p>     
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--//section-->
</div>
@endsection