@extends('master')
@section('content')

<div class="page-content">
   
    <div class="section" id="specialOffer">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub theme-color">مركز بن رشد الطبي للبصريات</div>
                <h2 class="h1">الأقسام</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row mb-5">
                @foreach (  $departments as $department )
                    
                <div class="col-sm-6">
                    <div class="special-card">
                        <div class="special-card-photo">
                            <img src="{{asset('images/departments')}}/{{$department->image}}" class="fixed-size-department"
                                alt="" >
                        </div>
                        <div class="special-card-caption text-right" style="width: 100%; left: 0%">
                            <div class="special-card-txt1 py-3 pr-2" style="background-color: white; width: 100%">
                                {{ $department->name }}
                                <div class="" ><a href="{{route('makeReservation')}}" class="btn"><i class="icon-right-arrow"></i><span>حجز موعد</span><i class="icon-right-arrow"></i></a></div>
                              </div>
                         
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
    </div>
    <!--//section special offers-->
</div>

    
@endsection