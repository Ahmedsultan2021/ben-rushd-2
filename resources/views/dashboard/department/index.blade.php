@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>الاقسام</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">الاقسام</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content mx-5 mb-5 ">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الاقسام</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                
                                <th>
                                    اسم القسم
                                </th>
                                <th>
                                    الفرع
                                </th>
                                <th>
                                    تم التحديث في
                                </th>

                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    
                                    <td>
                                      {{ $department->name }}
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                {{ $department->branch->name }}
                                            </li>

                                        </ul>
                                    </td>
                                    <td class="project_progress">
                                        <p>{{ $department->updated_at }}</p>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('department.show', ['department' => $department->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('department.edit', ['department' => $department->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm">
                                            <div class="delete-button-wrapper">
                                                <form action="{{ route('department.destroy', ['department' => $department->id]) }}" method="post" class="delete-form">
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
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
