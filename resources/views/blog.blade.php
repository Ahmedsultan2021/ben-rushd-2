@extends('master')
@section('content')
    <div class="my-5">
        <!--section-->
        <div class="section page-content-first">
            <div class="container">
                <div class="text-center mb-2  mb-md-3 mb-lg-4">
                    <h1>المدونة</h1>
                    <div class="h-decor"></div>
                </div>
            </div>
            <div class="container">
                <div class="blog-isotope">

                    @forelse ($posts as $post)
                        <div class="blog-post">
                            <div class="post-image">
                                <a href="{{route('blog-post-page',["id"=>$post->id])}}"><img src="{{ asset('images/posts') }}/{{ $post->image }}"
                                        alt=""></a>
                            </div>
                            <div class="blog-post-info post-meta d-flex flex-row-reverse">
                                <div class="post-date m-0 m-1 p-0">  {{ \Carbon\Carbon::parse($post->created_at)->format('d') }}<span>{{ \Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
								</div>
                                <div>
                                    <h2 class="post-title text-right"><a href="{{route('blog-post-page',["id"=>$post->id])}}">{{ $post->title }}</a>
                                    </h2>
                                    <div class="post-meta post-meta d-flex flex-row-reverse">
                                        <div class="post-meta-author m-0 ml-2 p-0"> كتب بواسطة <i>{{ $post->user->fname }}
                                                {{ $post->user->lname }}</i></div>
                                                <div class="post-meta-social">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog-post-page', $post->id)) }}&title={{ urlencode($post->title) }}" target="_blank"><i class="icon-facebook-logo"></i></a>
                                                    <a href="https://twitter.com/share?url={{ urlencode(route('blog-post-page', $post->id)) }}&text={{ urlencode($post->title) }}" target="_blank"><i class="icon-twitter-logo"></i></a>
                                                    <a href="https://plus.google.com/share?url={{ urlencode(route('blog-post-page', $post->id)) }}" target="_blank"><i class="icon-google-logo"></i></a>
                                                    <a href="https://www.instagram.com/?url={{ urlencode(route('blog-post-page', $post->id)) }}" target="_blank"><i class="icon-instagram"></i></a>
                                                  </div>
                                                  
                                                  
                                    </div>
                                </div>
                            </div>
                            <div class="post-teaser text-right"> {!! Str::limit(strip_tags($post->content), 150) !!}
                            </div>
                            <div class="mt-2"><a href="{{route('blog-post-page',["id"=>$post->id])}}" class="btn btn-sm btn-hover-fill"><i
                                        class="icon-right-arrow"></i><span>تابع القراءة</span><i
                                        class="icon-right-arrow"></i></a></div>
                        </div>
                    @empty
                        <div style="text-align: center">
                            <h3>لا يوجد مقالات حاليا</h3>
                            <h4>...قريبا</h4>
                        </div>
                    @endforelse

                </div>
                <div class="clearfix mt-3 mt-lg-4"></div>
                @include('custom_pagination', ['posts' => $posts])

            </div>
        </div>
    </div>
    </div>
@endsection
