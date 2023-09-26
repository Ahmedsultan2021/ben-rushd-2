@extends('dashboardMaster')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="card m-5">
                    <div class="card-body  d-flex align-items-center">
                        <i class="fab fa-wpforms" class="" ></i>
                        <h4 style="font-weight: bolder" class="px-3">عرض كل النماذج</h4>
                    </div>
                    <p class="card-text px-4 text-dark" >يتم هنا عرض جميع النماذج المعدة مسبقا</p>
                    <ul class="list-group list-group-flush">
                        @foreach ( $forms as $form )
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <a href="{{route('form.show',["form"=>$form->id])}}">{{$form->name}} </a> 
                            </div>
                            <div>

                                <a class="btn btn-primary btn-sm" href="{{route('form.show',["form"=>$form->id])}}"  >
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a  class="btn btn-info btn-sm" href="{{route('form.edit',["form"=>$form->id])}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm">
                                    <div class="delete-button-wrapper">
                                        <form action="{{route('form.destroy', ['form' => $form->id])}}" method="post" class="delete-form">
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
                        
                        </li>
                        @endforeach
                        <div class="d-flex justify-content-center" >
                            {{$forms->links()}}
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection