@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>الأطباء</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">الأطباء</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        @forelse ($doctors as $doctor)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
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
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-8">
                                                <h2 class="lead"><b>{{ $doctor->fname }} {{ $doctor->lname }}</b></h2>
                                                <p class="text-muted text-sm p-0 m-0"><b>عن الطبيب: &nbsp;
                                                    </b>{{ $doctor->Speciality }} </p>
                                                <p class="text-muted text-sm"><b> القسم: &nbsp;
                                                    </b>
                                                    @foreach ($doctor->departments as $department)
                                                        {{ $department->name }}
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <ul class="mb-0 fa-ul text-muted p-0 text-left" style="direction: rtl">
                                                    <li class="small"><i class="fas fa-lg fa-envelope"></i> البريد
                                                        الالكتروني: {{ $doctor->email }} </li>
                                                    <li class="small"><i class="fas fa-lg fa-phone"></i> رقم الهاتف:
                                                        {{ $doctor->phone }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-4 text-center d-flex align-content-center align-items-center">
                                                <div class="circular-image-container">
                                                    <img src="{{ asset('images/doctors/' . $doctor->image) }}"
                                                        alt="" class="circular-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('doctor.show', ['doctor' => $doctor->id]) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('doctor.edit', ['doctor' => $doctor->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" >
                                                <div class="delete-button-wrapper">
                                                    <form action="{{ route('doctor.destroy', ['doctor' => $doctor->id]) }}" method="post" class="delete-form">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm text-button delete-btn text-white" type="button">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            {!! $doctors->links() !!}
                        </ul>
                    </nav>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
