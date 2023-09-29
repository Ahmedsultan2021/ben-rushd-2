@extends('dashboardMaster')
@section('content')

<div class="content-wrapper">
    
        <div class="container">
            <div class="row pt-5">
                @forelse ( $posts as $post )
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">

                    <div class="card" style="width: 18rem;">
                        <img class="fixed-image-size" src="{{asset('images/posts')}}/{{$post->image}}" alt="Card image cap">
                        <div class="card-body text-left"  >
                            <h5 class="card-title" style="float: none" >{{$post->title}}</h5>
                            <p class="card-text"><small class="text-muted" >
                                {!! Str::limit(strip_tags($post->content), 150) !!}
                                

                                </small></p>
                            <a class="btn btn-primary btn-sm" href="{{route('posts.show',["post"=>$post->id])}}"  >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a  class="btn btn-info btn-sm" href="{{route('posts.edit',["post"=>$post->id])}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm">
                                <div class="delete-button-wrapper">
                                    <form action="{{route('posts.destroy',["post"=>$post->id])}}" method="post" class="delete-form">
                                        @method("DELETE")
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
           
                @empty
                    
                @endforelse
    
            </div>
        </div>
</div>
@endsection
