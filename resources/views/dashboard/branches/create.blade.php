@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1 mt-5">
                        <div class="card card-primary">
                            <div class="card-header d-flex">
                                <h3 class="card-title">اضافة فرع جديد</h3>
                            </div>
                            <form role="form" method="POST" action="{{ route('branches.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- Display general error messages -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم الفرع</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                                    placeholder="branch name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">اضف نبذة عن الفرع</label>
                                                    <textarea class="form-control" name="brief" id="" rows="3"
                                                        placeholder="brief">{{ old('brief') }}</textarea>
                                                    @error('brief')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">اضف صورة</label>
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
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">اضف الاحداثيات</label>
                                                <input type="text" name="coordinates" class="form-control" value="{{ old('coordinates') }}">
                                                @error('coordinates')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="active">اختر الحالة:</label>
                                                <select name="active" id="active" class="form-control">
                                                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>نشط</option>
                                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>غير نشط</option>
                                                </select>
                                                @error('active')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">العنوان </label>
                                                <textarea type="text" name="address" rows="4" class="form-control">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>مواعيد العمل</label>
                                            @php
                                                $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                            @endphp
                                        @foreach ($days as $day)
                                        <div class="d-flex flex-wrap">
                                            <label for="{{ strtolower($day) }}">{{ $day }}:</label>
                                            <input class="form-control" type="text" name="worktimes[{{ strtolower($day) }}]"
                                                value="{{ old('worktimes.' . strtolower($day)) }}">
                                            @error('worktimes.' . strtolower($day))
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                    {{-- <input type="hidden" name="worktimes" value="{{ json_encode(old('worktimes')) }}"> --}}
                                    
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
