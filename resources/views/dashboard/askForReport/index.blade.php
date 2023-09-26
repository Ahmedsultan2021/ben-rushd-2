@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>التقارير الطبية</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">التقارير الطبية</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <form action="{{ route('report.index') }}" method="get">
                                        <!-- Adjust this route to your needs -->
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="report_search" class="form-control"
                                                placeholder="Search" value="{{ request('report_search') }}">
                                            <small class="font-weight-bolder p-1">من</small>
                                            <input type="date" name="from_date" class="form-control"
                                                value="{{ request('from_date') }}">
                                            <small class="font-weight-bolder p-1">إلى</small>
                                            <input type="date" name="to_date" class="form-control"
                                                value="{{ request('to_date') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <h3 class="card-title">التقارير الطبية</h3>
                            </div>
                            <div class="card-body table-responsive p-0 " style="height: 300px;direction: rtl">
                                <table class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الاسم</th>
                                            <th>رقم التليفون</th>
                                            <th>رقم الملف</th>
                                            <th>الفرع</th>
                                            <th>اسم الطبيب</th>
                                            <th>تاريخ الطلب</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reports as $report)
                                            <tr>
                                                <td>{{ $report->id }}</td>
                                                <td>{{ $report->name }}</td>
                                                <td>{{ $report->phone }}</td>
                                                <td>{{ $report->FileNumber }}</td>
                                                <td>{{ $report->branch->name ?? '' }}</td>
                                                <td>{{ $report->doctor->fname ?? '' }} {{ $report->doctor->lname ?? '' }}</td>
                                                <td>{{ $report->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" >
                                                        <div class="delete-button-wrapper">
                                                            <form action="{{ route('report.destroy', ['report' => $report->id]) }}" method="post" class="delete-form">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm text-button delete-btn text-white" type="button">
                                                                    <i class="fas fa-trash"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">empty</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
