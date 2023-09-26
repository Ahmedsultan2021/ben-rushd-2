@extends('dashboardMaster')
@section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="container">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>عن المركز</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">عن المركز</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="card card-dark">
                                <div class="card-header text-start">
                                    <h3 class="card-title">عن المركز</h3>
                                </div>
                                <form role="form" enctype="multipart/form-data" method="POST"
                                    action="{{ route('about.save') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-start">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">بدايتنا (عن
                                                            المركز)</label>
                                                        <textarea class="form-control" name="description" id="" rows="5"> {{ $about['description'] }} </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label for="exampleInputFile">اختر صورة</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFilex" name="image"
                                                               >
                                                            <label class="custom-file-label" for="exampleInputFile">
                                                                @if ($about['image'])
                                                                    Current: {{ $about['image'] }}
                                                                @else
                                                                    Choose file
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                id="">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                    <input type="email" class="form-control"
                                                        id="exampleInputEmail1" name="email"
                                                        value="{{ $about['email'] }}" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">رابط الفيسبوك</label>
                                                    <input type="url" class="form-control"
                                                        value="{{ $about['facebook_link'] }}"
                                                        id="exampleInputPassword1" placeholder="رابط الفيسبوك"
                                                        name="facebook_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">رابط تويتر</label>
                                                    <input type="url" class="form-control"
                                                        value="{{ $about['twitter_link'] }}"
                                                        id="exampleInputPassword1" placeholder="رابط تويتر"
                                                        name="twitter_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">رابط انستجرام</label>
                                                    <input type="url" class="form-control"
                                                        value="{{ $about['instagram_link'] }}"
                                                        id="exampleInputPassword1" placeholder="رابط انستجرام"
                                                        name="instagram_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">رابط لينكد ان</label>
                                                    <input type="url" class="form-control"
                                                        value="{{ $about['linked_link'] }}"
                                                        id="exampleInputPassword1" placeholder="رابط لينكد ان"
                                                        name="linked_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">رابط يوتيوب </label>
                                                    <input type="url" class="form-control"
                                                        value="{{ $about['youtupe_link'] }}"
                                                        id="exampleInputPassword1" placeholder="رابط يوتيوب"
                                                        name="youtupe_link">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"> رقم الهاتف</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $about['phone_number'] }}"
                                                        id="exampleInputPassword1" placeholder="رقم الهاتف"
                                                        name="phone_number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"> رقم واتساب</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $about['whats_number'] }}"
                                                        id="exampleInputPassword1" placeholder="رقم واتساب"
                                                        name="whats_number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"> العنوان</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $about['address'] }}" id="exampleInputPassword1"
                                                        placeholder="العنوان" name="address">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center align-items-start pt-5">
                                            <img id="imagePreview"src="{{ asset('images') }}/{{ $about['image'] }}"
                                                alt="your image" style="display: block; max-width: 244px;">
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

    @endsection