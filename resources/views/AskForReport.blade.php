@extends('master')
@section('content')
<div class="page-content my-5">
    <!--section-->
   
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container">
            <div class="text-center mb-2  mb-md-3 mb-lg-4">
                <div class="h-sub theme-color" style="font-size: x-large" >نتشرف بخدمتكم</div>
                <h1>فروعنا</h1>
                <div class="h-decor"></div>
                <div class="text-center mt-4">
                    <h2 style="font-size: x-large; font-weight: 900"  >لطلب تقرير طبي
                        الرجاء إختيار الفرع المطلوب</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row col-equalH justify-content-center">
                @foreach ( $branches as $branch )
                    
                <div class="col-md-6 col-lg-3">
                    <div class="service-card" style="text-align: right">
                        <div class="service-card-photo">
                            <a href="{{route('reportpage',["branch_id"=>$branch->id])}}"><img src="{{asset('images/branches')}}/{{$branch->image}}"  style="width: 100%" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="{{route('reportpage',["branch_id"=>$branch->id])}}"> {{$branch->name}} </a></h5>
                        <div class="h-decor"></div>
                        <div class="d-flex justify-content-center" >
                            <a name="" id="" class="btn btn-primary rounded-0 p-1" style="padding: 0px" href="{{route('reportpage',["branch_id"=>$branch->id])}}" role="button">طلب تقرير طبي</a>
                        </div>
                    </div> 
                </div>
                @endforeach
              
              
            </div>
        </div>
    </div>
    <!--//section-->
</div>
@endsection