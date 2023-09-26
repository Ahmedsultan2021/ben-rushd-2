@extends('dashboardMaster')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          #
                      </th>
                      <th >
                          اسم الفرع
                      </th>
                    
                      <th >
                          الحالة
                      </th>
                      <th>
                          تم التحديث في
                      </th>
                      <th  class="text-center">
                          تم التحديث بواسطة
                      </th>
                      <th >
                        
                      </th>
                      <th >

                      </th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($branches as $branch )
                    
                <tr>
                    <td>
                       {{$loop->iteration}}
                    </td>
                    <td>
                        <a>
                            <li class="list-inline-item">
                              <span class="product-img mx-2">
                                <img src="{{asset('images/branches')}}/{{$branch->image}}" alt="Product Image"
                                class="img-size-50">
                            </span>
                                {{-- <img alt="Avatar"  class="table-avatar" src="{{asset('images/branches')}}/{{$branch->image}}"> --}}
                            </li>
                            {{$branch->name}}
                        </a>
                        <br/>
                        <small>
                            <p>

                              {{$branch->created_at}}
                                {{-- images/brancehs/{{$branch->image}} --}}
                            </p>
                        </small>
                    </td>
                  
                    <td>
                        @if($branch->active)
                            <span class="badge badge-success">نشط</span>
                        @else
                            <span class="badge badge-danger">غير نشط</span>
                        @endif
                    </td>
                    <td class="list-inline-item">
                        <p>{{$branch->updated_at}}</p>
                    </td>
                    <td class="project-state">
                        @if ($branch->created_by)
                        <small> {{$branch->created_by->fname}} {{$branch->created_by->lname}}</small>
                        @endif
                    </td>
                    <td class="project-actions text-right" colspan="2">
                        <a class="btn btn-primary btn-sm" href="{{route('branches.show',["branch"=>$branch->id])}}"  >
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a  class="btn btn-info btn-sm" href="{{route('branches.edit',["branch"=>$branch->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm ">
                          <div class="delete-button-wrapper">
                            <form action="{{ route('branches.destroy', ['branch' => $branch->id]) }}" method="post" class="delete-form">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm text-button delete-btn text-white" type="button" >
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                        
                      </a>
                      
                    </td>
                    <td></td>
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