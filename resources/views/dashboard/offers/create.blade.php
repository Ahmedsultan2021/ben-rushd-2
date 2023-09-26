@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 offset-md-2">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">اضافة عرض جديد</h3>
                            </div>
                            <form role="form" method="POST" enctype="multipart/form-data" action="{{route('offer.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="اسم العرض">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">الوصف</label>
                                        <textarea class="form-control" name="description" id="" rows="3">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">الصورة</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">الحالة</label>
                                        <select class="form-control" name="active" id="">
                                            <option selected disabled>Select one</option>
                                            <option value="true" {{ old('active') == 'true' ? 'selected' : '' }}>نشط</option>
                                            <option value="false" {{ old('active') == 'false' ? 'selected' : '' }}>غير نشط</option>
                                        </select>
                                        @error('active')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="start_time">وقت بداية الحملة الدعائية</label>
                                        <input type="datetime-local" class="form-control" name="startTime" value="{{ old('startTime') }}" id="start_time" placeholder="وقت بداية العرض">
                                        @error('startTime')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="end_time">وقت نهاية الحملة الدعائية</label>
                                        <input type="datetime-local" class="form-control" name="endTime" value="{{ old('endTime') }}" id="end_time" placeholder="وقت نهاية العرض">
                                        @error('endTime')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">اضافة</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
