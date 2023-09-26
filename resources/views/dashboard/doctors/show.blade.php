@extends('dashboardMaster')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>الصفحة الشخصية</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">الصفحة الشخصية</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <div class="circular-image-container">
                    <img src="{{ asset('images/doctors/' . $doctor->image) }}"
                        alt="" class="circular-image">
                </div>
                </div>

                <h3 class="profile-username text-center">{{$doctor->fname}} {{$doctor->lname}}</h3>

                <p class="text-muted text-center">{{$doctor->Speciality}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>طلب التقارير</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>الحجوزات</b> <a class="float-right">543</a>
                  </li>
                </ul>
                <a href="https://wa.me/{{$doctor->phone}}" class="btn btn-success btn-block" target="_blank"><b>Send WhatsApp Message</b></a>

                <a href="mailto:{{$doctor->email}}" class="btn btn-primary btn-block"><b>Send Email</b></a>
            </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">عن الطبيب</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" > الفرع  </span> </strong>
                    </div>

                    <p class="text-muted" >
                      @if ($doctor->branches->isEmpty())
                      N/A
                  @else
                      @foreach ($doctor->branches as $branch)
                          {{ $branch->name }}
                          @if (!$loop->last)
                              ,
                          @endif
                      @endforeach
                  @endif
                    </p>
               
                  <hr>
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" > القسم  </span> </strong>
                    </div>

                    <p class="text-muted" >
                      @foreach ($doctor->departments as $department)
                      {{ $department->name }}
                      @if (!$loop->last)
                          ,
                      @endif
                  @endforeach                    </p>
               
                  <hr>
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" > الدرجة الجامعية </span> </strong>
                    </div>

                    <p class="text-muted" >
                        {{$doctor->Degrees}}
                    </p>
                  <hr>
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" >التخصص الدقيق </span> </strong>
                    </div>

                    <p class="text-muted" >
                        {{$doctor->Speciality}}
                    </p>
                  <hr>
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" >نبذة عن الطبيب </span> </strong>
                    </div>

                    <p class="text-muted" >
                        {{$doctor->brief}}
                    </p>
               
                  <hr>
                    <div class="mb-1">
                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" >المؤهلات </span> </strong>
                    </div>
                  @foreach(json_decode($doctor->qualifications, true) as $qualification)
                  <ul class="text-muted">
                    <li> {{ $qualification }} </li>
                  </ul>
                 @endforeach
  
                  <hr>
                    <div class="mb-1">

                        <strong ><i class="fas fa-book mr-1"></i> <span style="font-size: larger" >الخبرات </span> </strong>
                    </div>
                  @foreach(json_decode($doctor->experience, true) as $experience)
                  <ul class="text-muted">
                    <li> {{ $experience }} </li>
                  </ul>
                 @endforeach
  
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection