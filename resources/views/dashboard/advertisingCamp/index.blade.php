@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <a name="" id="" class="btn btn-primary" href="{{ route('form.create') }}" role="button">
                        انشاء نموذج جديد</a>
                </div>
            </div>
            <div class="row">
                @foreach ($campaigns as $campaign)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top campaign-image" src="{{ asset('images/campaigns') }}/{{ $campaign->image }}"
                                alt="Title">
                            <div class="card-body">
                                <h4 class="" style="font-weight: bolder">{{ $campaign->title }}</h4>
                                <p class="card-text">{{ Str::substr($campaign->description, 0, 100) }}...</p>
                            </div>
                            <div class="project-actions text-center p-2">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('campaign.show', ['campaign' => $campaign->id]) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('campaign.edit', ['campaign' => $campaign->id]) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm">
                                    <div class="delete-button-wrapper">
                                        <form action="{{ route('campaign.destroy', ['campaign' => $campaign->id]) }}" method="post" class="delete-form">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm text-button delete-btn text-white" type="button" >
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
