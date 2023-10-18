@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
    
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 offset-md-2">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تعديل عرض </h3>
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
                            <form role="form" method="POST" enctype="multipart/form-data" action="{{route('offer.update',["offer"=>$offer->id])}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الاسم</label>
                                        <input type="text" name="title" value="{{ old('title',$offer->title ) }}" class="form-control" id="exampleInputEmail1" placeholder="اسم العرض">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">الوصف</label>
                                        <textarea class="form-control" name="description" id="" rows="3">{{ old('description',$offer->description) }}</textarea>
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
                                        <label class="form-label">الحالة</label>
                                        <select class="form-control" name="active" id="">
                                            <option selected disabled>Select One</option>
                                            <option value="1" {{ old('active',$offer->active ) == '1' ? 'selected' : '' }}>نشط</option>
                                            <option value="0" {{ old('active',$offer->active  ) == '0' ? 'selected' : '' }}>غير نشط</option>
                                        </select>
                                        @error('active')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="start_time">وقت بداية الحملة الدعائية</label>
                                        <input type="datetime-local" class="form-control" name="startTime" value="{{ \Carbon\Carbon::parse($offer->startTime)->format('Y-m-d\TH:i') ?: old('startTime') }}" id="start_time" placeholder="وقت بداية العرض">
                                        @error('startTime')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="end_time">وقت نهاية الحملة الدعائية</label>
                                        <input type="datetime-local" class="form-control" name="endTime" value="{{ old('endTime', $offer->endTime ? \Carbon\Carbon::parse($offer->endTime)->format('Y-m-d\TH:i') : null) }}" id="end_time" placeholder="وقت نهاية العرض">
                                        @error('endTime')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">تحديث</button>
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
