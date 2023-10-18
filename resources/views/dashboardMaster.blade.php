<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>بن رشد | لوحة التحكم</title>
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"/>
<link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">






<style>
.campaign-image {
    width: 100%;    /* occupy the full width of the card */
    height: 200px;  /* set a fixed height */
    object-fit: cover; /* ensures the aspect ratio of the image is maintained */
}
.fixed-image-size{
  width: 100%;
  height: 150px;
  object-fit: cover
}

.text-button {
  border: none;
  background-color: transparent;
  color: inherit;
  font-size: inherit;
  padding: 0;
  cursor: pointer;
}
.main-sidebar{
  overflow-y: clip;
}
.circular-image-container {
    width: 100px; /* or whatever size you want */
    height: 100px;
    border-radius: 50%;
    overflow: hidden; /* to ensure nothing goes outside of the circular container */
    display: inline-block;
}

.circular-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* ensures the image covers the entire container */
    border-radius: 50%; /* makes the image circular */
    display: block; /* removes any space at the bottom of the image */
}

  
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">الصفحة الرئيسية</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <span class="brand-text font-weight-bolder" >بن رشد - لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="margin-right: 20px">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::check())
          <a href="#" class="d-block">{{Auth::user()->fname}} {{Auth::user()->lname}}</a>
          @endif
            {{-- @isset($user)
            <a href="#" class="d-block">{{$user->fname}}</a>
            @endisset
            <a href="#" class="d-block">{{$user->fname}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                لوحة التحكم
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('report.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                التقارير الطبية
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('reservation.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 الحجوزات
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-people-carry " aria-hidden="true"></i>
              <p>
               خدمة المجتمع
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-people-carry " aria-hidden="true"></i>
              <p>
                الاطباء
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon far fa-handshake"></i>
              <i class="nav-icon fa fa-people-carry " aria-hidden="true"></i>
              <p>
                الشركاء
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                الاخبار
              </p>
            </a>
          </li>
       --}}
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                العروض
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('offer.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>العروض</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('offer.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضف عرض</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                الاطباء
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctor.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الاطباء</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doctor.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضف طبيب</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-building"></i> --}}
              <i class="nav-icon fas fa-blog"></i>

              <p>
                المدونة
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>المقالات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضف مقالة</p>
                </a>
              </li>
             
            </ul>
          </li>
   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                الاقسام
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('department.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الاقسام</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('department.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضف قسم</p>
                </a>
              </li>
           
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
                الفروع
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('branches.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>كل الفروع</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('branches.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة فرع جديد</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                الحملات الدعائية
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('campaign.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> الحملات الدعائية</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('campaign.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>انشاء حملة جديدة</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                النماذج
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('listforms')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> النماذج المعدة  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('form.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>انشاء نموذج جديد</p>
                </a>
              </li>
            </ul>
          </li>
         

          <li class="nav-header">الاعدادات</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                            <p>
                المستخدمين
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                الادوار
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
                <i class="nav-icon far fa-newspaper"></i>
                <p>
                     عن المركز
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('about.edit') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>تعديل </p>
                    </a>
                </li>
            </ul>
        </li>
          
        
        
          <li class="nav-header">تسجيل الخروج</li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              {{-- <i class="nav-icon far fa-image"></i> --}}
              <form action="{{route('logout')}}" method="post">
                @csrf
                <i class="nav-icon fa fa-external-link-alt" ></i>
                <button type="submit" class="text-button" >
                  تسجيل الخروج
                </button>
              </form>
            </a>
          </li>

      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div>
    
    @yield('content')
  </div>
 
  <!-- /.content-wrapper -->
  <footer class="main-footer" >
    <strong>جميع الحقوق محفوظة &copy; 2014-2023 <a href="https://www.binrushd.net/">www.binrushd.net</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 rtl -->
<script src="{{asset('bootstrap.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

<script>
let qualifications = [];
let experiences = [];

// Initialize lists with old values if they exist
function initOldValues() {
    let oldQualifications = document.getElementById("qualificationsInput").value;
    let oldExperiences = document.getElementById("experiencesInput").value;

    if (oldQualifications) {
        qualifications = JSON.parse(oldQualifications);
        updateList(qualifications, 'qualificationList');
    }

    if (oldExperiences) {
        experiences = JSON.parse(oldExperiences);
        updateList(experiences, 'experienceList');
    }
}

function updateList(list, elementId) {
    const listElement = document.getElementById(elementId);
    listElement.innerHTML = '';

    list.forEach((item, index) => {
        listElement.innerHTML += `<li>${item} <button onclick="removeItem(${index}, '${elementId}')" class="btn btn-danger btn-sm m-1">Remove</button></li>`;
    });
}

function removeItem(index, elementId) {
    const list = elementId === 'qualificationList' ? qualifications : experiences;
    list.splice(index, 1);
    updateList(list, elementId);
    document.getElementById(elementId === 'qualificationList' ? 'qualificationsInput' : 'experiencesInput').value = JSON.stringify(list);
}

function addQualification() {
    const qualificationInput = document.getElementById("qualificationInput").value;

    if (qualificationInput === '') {
        alert('Please enter a qualification.');
        return;
    }

    qualifications.push(qualificationInput);
    updateList(qualifications, 'qualificationList');
    document.getElementById("qualificationInput").value = '';
    document.getElementById("qualificationsInput").value = JSON.stringify(qualifications);
}

function addExperience() {
    const experienceInput = document.getElementById("experienceInput").value;

    if (experienceInput === '') {
        alert('Please enter an experience.');
        return;
    }

    experiences.push(experienceInput);
    updateList(experiences, 'experienceList');
    document.getElementById("experienceInput").value = '';
    document.getElementById("experiencesInput").value = JSON.stringify(experiences);
}

// Initialize old values when the page loads
document.addEventListener("DOMContentLoaded", function() {
    initOldValues();
});



$(document).ready(function() {
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        var input = this;
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $(".image-preview").attr("src", e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
    let anchors = document.querySelectorAll('.copy-link-anchor');
    
    anchors.forEach(anchor => {
        anchor.addEventListener('click', function(event) {
            event.preventDefault();  // Prevent default action (navigation)
            
            // Copy URL to clipboard
            let textArea = document.createElement("textarea");
            textArea.value = anchor.href;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            
            // Optional: Notify user that link was copied
            alert('تم نسخ الرابط');
        });
    });
});

    function submitForm() {
        // Update the form's action to point to the 'download.reservations' route
        document.getElementById('search-form').action = "{{ route('download.reservations') }}";
        // Submit the form
        document.getElementById('search-form').submit();
    }
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                
                const id = button.getAttribute('data-id');
                
                const userConfirmed = window.confirm("Are you sure you want to delete this?");
                
                if (userConfirmed) {
                    let form = document.createElement('form');
                    form.method = 'post';
                    form.action = `/branches/${id}`;
                    
                    let methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    
                    let csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = `{{ csrf_token() }}`;
                    
                    form.appendChild(methodInput);
                    form.appendChild(csrfInput);
                    
                    document.body.appendChild(form);
                    
                    form.submit();
                }
            });
        });
    });
    $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#imagePreview').attr('src', e.target.result).css('display', 'block');
                        }

                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                    }
                }

                $("#exampleInputFilex").change(function() {
                    readURL(this);

                    // Display the selected file name in the custom-file-label
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            });


            $(document).ready(function() {
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('.delete-form');

        $.confirm({
            title: 'تأكيد',
            content: 'هل أنت متأكد من رغبتك في الحذف',
            buttons: {
                confirm: {
                    text: 'نعم', // Changes the text
                    btnClass: 'btn-success', // Adds a class to style
                    action: function() {
                        form.submit();
                    }
                },
                cancel: {
                    text: 'لا', // Changes the text
                    btnClass: 'btn-danger', // Adds a class to style

                    action: function() {
                        // close the dialog
                    }
                }
            }
        });
    });
});

  

    
</script>

</body>
</html>
