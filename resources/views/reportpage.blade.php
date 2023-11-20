@extends('master')
@section('content')
<div class="my-5" >
    
    <div class="page-content" style="direction: rtl; text-align: start">
      
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md col-lg-5">
                        <div class="pr-0 pr-lg-8">
                            <div class="title-wrap">
                                <h2>يرجى تعبئة النموذج لطلب تقرير طبي من  {{$branch->name}} </h2>
                                <div class="h-decor"></div>
                            </div>
                            <div class="mt-2 mt-lg-4">
                                <p>ملاحظة/ يستغرق تجهيز التقارير الطبية 5 أيام عمل من تاريخ طلبه.</p>
                                <p class="p-sm">Fields marked with a * are required.</p>
                            </div>
                            <div class="mt-2 mt-md-5"></div>
                            <h5>كن على تواصل</h5>
                            <div class="content-social mt-15">
                                <a href="{{ $about['facebook_link'] }}" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
                                <a href="{{$about['twitter_link']}}" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                                <a href="mailto:{{$about['email']}}" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                                <a href="{{ $about['instagram_link'] }}" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
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

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
  
                        
                        <form class="contact-form" method="post" novalidate="novalidate" action="{{route('report.store')}}">
                            @csrf

                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="name" placeholder="*اسمك" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                
                            </div>
                       
                            <div class="mt-15">
                                <input type="text" class="form-control" name="phone" placeholder="*الجوال" value="{{old('phone')}}">
                                   @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-15">
                                <input type="text" class="form-control" name="FileNumber" placeholder="*رقم الملف" value="{{ old('FileNumber') }}">
                            
                                @error('FileNumber')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mt-15">
                                <select class="form-control" name="doctor_id" aria-label="Default select example">
                                    <option value="" {{ old('doctor_id') ? '' : 'selected' }}>اختر طبيبك</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->fname }} {{ $doctor->lname }}
                                        </option>
                                    @endforeach
                                </select>
                            
                                @error('doctor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="branch_id" value="{{$branch_id}}" >
                            
                            <div class="mt-3">
                                <button type="submit" class="btn btn-hover-fill"> <i class="icon-left-arrow"></i>  <span>إرسال</span> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--//section-->
    </div>
    
</div>
@endsection