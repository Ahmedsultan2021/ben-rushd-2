@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> &nbsp; الحملة الدعائية :&nbsp; {{ $campaign->title }} </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">الحملات الدعائية</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">CPU Traffic</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                                <div class="col-12 ">
                                    <img  src="{{ asset('images/campaigns') }}/{{ $campaign->image }}" class="fixed-image-size"
                                        alt="Product Image">
                                    <div class="col-12">

                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{ $campaign->title }}</h3>
                                <p>{{ $campaign->description }}</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- PRODUCT LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">روابط التسجيل بالحملة بالمنصات المختلفة</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            @forelse ($forms as $form)
                                                <li class="item">
                                                    <div class="product-img">
                                                        <!-- Wrapping the image with anchor tag -->
                                                        <a href="{{ route('campaignResponse', ['form_id' => $form->id, 'campaign_id' => $campaign->id]) }}"
                                                            class="copy-link-anchor">
                                                            <img src="{{ asset('images/checklist.png') }}"
                                                                alt="Product Image" class="img-size-50">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ route('campaignResponse', ['form_id' => $form->id, 'campaign_id' => $campaign->id]) }}"
                                                            class="product-title" target="_blank"> {{ $form->name }}
                                                            <span
                                                                class="badge badge-danger float-right">{{ $form->form_responses_count }}</span>
                                                        </a>
                                                        <span class="product-description">
                                                            {{ $form->description }}
                                                        </span>
                                                    </div>
                                                </li>
                                            @empty
                                            @endforelse

                                        </ul>
                                    </div>
                                    {{-- <div class="card-footer text-center">
                                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                @foreach ($campaign->forms as $form)
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ $form->name }}</h3>
                                            <div class="card-tools d-flex">
                                                <!-- Download Excel button -->
                                                <a href="{{ route('form.export', $form->id) }}" class="btn btn-primary btn-sm mr-2">تحميل ملف exel</a>
                        
                                                <form action="{{ route('campaign.show', $campaign->id) }}" method="get">
                                                    <!-- Hidden input to hold the form_id -->
                                                    <input type="hidden" name="form_id" value="{{ $form->id }}">
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                                                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                @if ($form->formResponses->first())
                                                    <thead>
                                                        <tr>
                                                            <th>Response ID</th>
                                                            @foreach ($form->formResponses->first()->fieldResponses as $fieldResponse)
                                                                <th>{{ $fieldResponse->formField->label }}</th>
                                                            @endforeach
                                                            <th>وقت التسجيل</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($form->formResponses as $formResponse)
                                                            <tr>
                                                                <td>{{ $formResponse->id }}</td>
                                                                @foreach ($formResponse->fieldResponses as $fieldResponse)
                                                                    <td>{{ $fieldResponse->value }}</td>
                                                                @endforeach
                                                                <td>{{ $formResponse->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                @else
                                                    <p class="p-3">لا يوجد ردود حتى الان</p>
                                                @endif
                                            </table>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            {{ $form->formResponses->appends(['form_' . $form->id => $form->formResponses->currentPage()])->links() }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div> <!-- Content Header (Page header) -->

    </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
