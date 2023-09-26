@extends('master')
@section('content')
    <!--//quick links-->
	<div class="page-content">
		<!--section-->
		{{-- <div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="breadcrumbs">
						<a href="index.html">الص</a>
						<span>Blog</span>
					</div>
				</div>
			</div>
		</div> --}}
		<!--//section-->
		<!--section-->
		<div class="section page-content-first">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 aside">
						<div class="blog-post blog-post-single">
							<div class="blog-post-info d-flex flex-row-reverse"  >
								<div class="post-date m-0 ml-3">  {{ \Carbon\Carbon::parse($post->created_at)->format('d') }}<span>{{ \Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
								</div>
								<div>
                                    <h2 class="post-title text-right">{{ $post->title }}
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
							<div class="post-image">
								<img src="{{ asset('images/posts') }}/{{ $post->image }}" alt="">
							</div>
							<div class="post-text" style="text-align: right" >
								{!! $post->content  !!}
								</div>
							
						</div>
					
						
					</div>
					<div class="col-lg-3 aside-left mt-5 mt-lg-0">
				
					
						<div class="side-block">
							<h3 class="side-block-title">Recent Posts</h3>
							<div class="blog-post post-preview">
								<div class="post-image">
									<a href="blog-post-page.html"><img src="images/blog/blog-post-featured-1.jpg" alt=""></a>
								</div>
								<div>
									<h4 class="post-title"><a href="blog-post-page.html">Are you brushing your teeth correctly?</a></h4>
									<div class="post-meta">
										<div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
										<div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
									</div>
								</div>
							</div>
							<div class="blog-post post-preview">
								<div class="post-image">
									<a href="blog-post-page.html"><img src="images/blog/blog-post-featured-2.jpg" alt=""></a>
								</div>
								<div>
									<h4 class="post-title"><a href="blog-post-page.html">FREE Dental Screening & X-Rays</a></h4>
									<div class="post-meta">
										<div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
										<div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
									</div>
								</div>
							</div>
							<div class="blog-post post-preview">
								<div class="post-image">
									<a href="blog-post-page.html"><img src="images/blog/blog-post-featured-3.jpg" alt=""></a>
								</div>
								<div>
									<h4 class="post-title"><a href="blog-post-page.html">How to Choose the Best Toothbrush</a></h4>
									<div class="post-meta">
										<div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
										<div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
									</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
	</div>
	<!--footer-->
@endsection