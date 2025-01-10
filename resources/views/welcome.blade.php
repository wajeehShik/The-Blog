<x-front-layout>
    <link rel="stylesheet" href="{{asset('frontend/v1/css/WOW-master/css/libs/animate.css')}}">
      <!-- Start Blog Area -->
      <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="blog-page">
        					<!-- Start Single Post -->
							@foreach ($posts as $post)
        					<article class="blog__post d-flex flex-wrap ">
        						<div class="thumb">
        							<a href="{{route('front.post.show',$post->slug)}}">
        								<img src="{{$post->image_url}}" alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4 class="wowo pulse"><a href="{{route('front.post.show',$post->slug)}}">{{$post->title}}</a></h4>
        							<ul class="post__meta">
        								<li>Posts by : <a href="#">{{$post->admin->name}}</a></li>
        								<li class="post_separator">/</li>
        								<li>{{\Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</li>
        							</ul>
<p>{{$post->description}}</p>
        							<div class="blog__btn">
        								<a href="{{route('front.post.show',$post->slug)}}">read more</a>
        							</div>
        						</div>
        					</article>
							@endforeach
        					<!-- End Single Post -->
        				
        				</div>

        			{{$posts->links('vendor.pagination.home')}}
        			</div>
        	
					<x-sidebar-layout/>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->
</x-front-layout>