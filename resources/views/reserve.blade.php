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
                                <h2>يرجى تعبئة النموذج لحجز موعد 
                                </h2>
                                <div class="h-decor"></div>
                            </div>
                            <div class="mt-2 mt-lg-4">
                                <p>يضم المركز جميع التخصصات الدقيقة لطب وجراحة العيون , بن رشد خيارك الأول</p>
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
                              <span class="alertText"> تم حجز الموعد بنجاح

                              <br class="clear"/></span>
                            </div>
                          </label>
                        @endif
                        {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
  
                        
                        <form class="contact-form" method="post" novalidate="novalidate" action="{{route('reservation.store')}}">
                            @csrf
                            <input type="hidden" class="form-control" name="isOffer" value="0">

                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="customerName" required placeholder="*اسمك" value="{{ old('customerName') }}">

                                @if ($errors->has('customerName'))
                                    <span class="text-danger">{{ $errors->first('customerName') }}</span>
                                @endif
                            </div>
                            <div class="mt-15">
                                <input type="text" class="form-control" name="phone" required placeholder="*الجوال" value="{{old('phone')}}">
                                   @error('phone') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-15">
                                <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني" value="{{old('email')}}">
                                   @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mt-15">
                                <select class="form-control" name="servay" required  aria-label="Default select example">
                                    <option value="">كيف سمعت عن المركز</option>
                                    <option value="internet">  الانترنت </option>
                                    <option value="sms">  رسائل الجوال </option>
                                    <option value="WordOfMouth">  الأهل والأصدقاء </option>
                                </select>
                                @error('branch_id') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-15">
                                <select class="form-control" required name="branch_id" id="branchDropdown" aria-label="Default select example">
                                    <option value="" {{ old('branch_id') ? '' : 'selected' }}>اختر الفرع</option>
                                    @foreach ($branches as $id => $name)
                                        <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>
                                            {{ $name }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('branch_id') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-15">
                                <select class="form-control" required name="doctor_id" id="doctorDropdown" aria-label="Default select example">
                                    <option value="" {{ old('doctor_id') ? '' : 'selected' }}>اختر الطبيب</option>
                                    <!-- Dynamic population will be handled by JS -->
                                </select>
                                @error('doctor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            {{-- <input type="hidden" name="branch_id" value="{{$branch_id}}" id=""> --}}
                            
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

<script>
    // Listen for changes on the branch dropdown
document.querySelector('#branchDropdown').addEventListener('change', function() {
    // Get the selected branch ID
    let branchId = this.value;

    // Clear current doctors dropdown
    let doctorDropdown = document.querySelector('#doctorDropdown');
    doctorDropdown.innerHTML = '<option value="">اختر الطبيب</option>';

    // If no branch is selected, exit
    if (!branchId) {
        return;
    }

    // Fetch doctors for this branch from your backend API
    fetch(`/api/get-doctors/${branchId}`)
    .then(response => response.json())
    .then(data => {
        // Populate doctors dropdown with fetched data
        data.forEach(doctor => {
            let option = document.createElement('option');
            option.value = doctor.id;
            option.textContent = `${doctor.fname} ${doctor.lname}`;
            doctorDropdown.appendChild(option);
        });
    })
    .catch(error => {
        console.error("There was an error fetching the doctors: ", error);
    });
});

</script>
@endsection