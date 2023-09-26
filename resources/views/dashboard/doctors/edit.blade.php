@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تعديل معلومات الطبيب</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item active">تعديل معلومات الطبيب</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8 offset-md-2">
                        <!-- general form elements disabled -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">تعديل معلومات الطبيب</h3>
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" id="textForm" method="POST" action="{{ route('doctor.update',["doctor"=>$doctor->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row pb-5">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="customFile">صورة الطبيب</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" value="{{$doctor->image}}"
                                                        class="custom-file-input @error('image') is-invalid @enderror"
                                                        id="customFile" >
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <input type="hidden" name="image" value="{{$doctor->image}}">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <img style="margin-top: 2% " class="image-preview"   src="{{asset('images/doctors')}}/{{$doctor->image}}"
                                                width="100%" >
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> اسم الطبيب الاول</label>
                                                <input type="text" name="fname" class="form-control"
                                                    value="{{ $doctor->fname }}" placeholder="Enter ...">
                                                @error('fname')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> اسم الطبيب الأخير</label>
                                                <input type="text" name="lname" class="form-control"
                                                    value="{{ $doctor->lname }}" placeholder="Enter ...">
                                                @error('lname')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> البريد الالكتروني </label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $doctor->email }}" placeholder="Enter ...">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label> رقم الهاتف </label>
                                                <input type="number" name="phone" class="form-control"
                                                    value="{{ $doctor->phone }}" placeholder="Enter ...">
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>أضف مؤهلات</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" onclick="addQualification()"
                                                            class="btn btn-dark">أضف مؤهل</button>
                                                    </div>
                                                    <input type="text" class="form-control" id="qualificationInput"
                                                        >
                                                </div>
                                                @error('qualifications')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="qualificationList"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <div>
                                                <div id="textContainer"></div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>أضف خبرات</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" onclick="addExperience()"
                                                            class="btn btn-dark">أضف خبرة</button>
                                                    </div>
                                                    <input type="text" class="form-control" id="experienceInput"
                                                       >
                                                </div>
                                                @error('experiences')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="experienceList"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="qualifications" id="qualificationsInput" value="{{ old('qualifications', $doctor->qualifications) }}">
                                        <input type="hidden" name="experiences" id="experiencesInput" value="{{ old('experiences', $doctor->experience) }}">
                                        
                                        
                                        <div class="col-sm-7">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>نبذة عن الطبيب</label>
                                                <textarea class="form-control" name="brief" rows="8" placeholder="نبذة عن الطبيب ... ">{{ old('brief', $doctor->brief) }}</textarea>
                                            </div>
                                            @error('brief')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="" class="form-label">الجنس</label>
                                                <select class="form-control" name="gender" id="">
                                                    <option value="" disabled {{ old('gender', $doctor->Gender ?? null) ? '' : 'selected' }}>
                                                        Select one</option>
                                                    <option value="Male" 
                                                        {{ old('gender', $doctor->Gender ?? null) == 'Male' ? 'selected' : '' }}>ذكر</option>
                                                    <option value="Female"
                                                        {{ old('gender', $doctor->Gender ?? null) == 'Female' ? 'selected' : '' }}>انثى</option>
                                                </select>
                                                @error('gender')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="" class="form-label">الفرع</label>
                                                <select class="form-control" name="branch_ids[]" id="" multiple>
                                                    @foreach ($branches as $name => $id)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('branch_ids')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="department_ids" class="form-label">الأقسام</label>
                                                <select class="form-control" name="department_ids[]" id="department_ids" multiple>
                                                    @foreach ($departments as $name => $id)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('department_ids')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-7">
                                            <label for="" class="form-label">الدرجة الجامعية</label>
                                            <input type="text" name="degree" class="form-control" value="{{ old('degree', $doctor->Degrees ?? '') }}">
                                            @error('degree')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        

                                        <div class="col-sm-7">
                                            <label for="" class="form-label"> التخصص الدقيق</label>
                                            <input type="text" name="speciality" class="form-control" value="{{ old('speciality', $doctor->Speciality ?? '') }}">
                                            @error('speciality')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="" class="form-label">طبيب بارز</label>
                                                <select class="form-control" name="highligthed" id="">
                                                    <option value="" disabled {{ old('highligthed', $doctor->highligthed ?? null) ? '' : 'selected' }}>
                                                        Select one</option>
                                                    <option value="1" 
                                                        {{ old('highligthed', $doctor->highligthed ?? null) == '1' ? 'selected' : '' }}>نعم</option>
                                                    <option value="0"
                                                        {{ old('highligthed', $doctor->highligthed ?? null) == '0' ? 'selected' : '' }}>لا</option>
                                                </select>
                                                @error('highligthed')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" class="btn btn-dark m-3" value="تحديث">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @endsection
