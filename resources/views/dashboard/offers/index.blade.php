@extends('dashboardMaster')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">العروض </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">العروض </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
               
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-10 offset-md-1">
                
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">العروض</h3>

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
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>العنوان</th>
                                                <th>الحالة</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>اخر تعديل</th>
                                                <th> تم التعديل بواسطة</th>
                                                <th colspan="" > </th>
                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($offers as $offer )
                                                
                                            <tr>
                                            
                                                <td>{{$offer->title}}</td>
                                                <td>
                                                    @if($offer->active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                      {{$offer->created_at}}</div>
                                                </td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                      {{$offer->updated_at}}</div>
                                                </td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                      {{$offer->updatedBy->fname}} {{$offer->updatedBy->lname}}  </div>
                                                </td>
                                                <td class="d-flex flex-nowrap " style="gap: 5px">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('offer.show', ['offer' => $offer->id]) }}">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('offer.edit', ['offer' => $offer->id]) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" >
                                                        <div class="delete-button-wrapper">
                                                            <form action="{{ route('offer.destroy', ['offer' => $offer->id]) }}" method="post" class="delete-form">
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
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="{{route('offer.create')}}" class="btn btn-sm btn-info float-left">اضافة عرض جديد</a>
                                <a href="{{route('offer.index')}}"  class="btn btn-sm btn-secondary float-right">كل العروض
                                     
                                </a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->


                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
