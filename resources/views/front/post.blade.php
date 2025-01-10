<x-front-layout>
    <div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                <img src="{{$post->image_url}}" alt="blog images" width="800px">
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{$post->title}}</h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post_content">
                                 {!!$post->content!!}
                                </div>
                                <ul class="blog_meta">
                                    <li><a href="#">{{$post->comments_count}} comments</a></li>
                                    <li> / </li>
                                    <li>Tags:
                                        @foreach ($post->tags as $tag)
                                        <span>{{$tag->name}}</span>  
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <div class="comments_area">
                            <h3 class="comment__title">{{$post->comments_count}} comment</h3>
                            <ul class="comment__list">
                                @foreach ($post->comments as $comment)
                                    
                                <li>
                                    <div class="wn__comment">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/images/blog/comment/1.jpeg')}}" alt="comment images">
                                        </div>
                                        <div class="content">
                                            <div class="comnt__author d-block d-sm-flex">
                                                <span>{{$comment->name}}</span>
                                                <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('F j, Y') }}</span>
                                                <div class="reply__btn">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="comment_respond">
                            <h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3>
                            <form class="comment__form" method="POST" action="{{route('front.post.comment')}}">
                                @csrf
                                <input type="hidden" name="slug" value="{{$post->slug}}">
                                <p>Your email address will not be published.Required fields are marked </p>
                                <div class="input__wrapper clearfix">
                                    <div class="input__box name one--third mb-3">
                                        <input type="text" placeholder="name" value="{{old('name')}}" name="name">
                                    </div>
                                    <div class="input__box email one--third">
                                        <input type="email" placeholder="email" value="{{old('email')}}" name="email">
                                    </div>
                                </div>
                                <div class="input__box">
                                    <textarea name="comment" placeholder="Your comment here">{{old('comment')}}</textarea>
                                </div>
                              
                                <div class="submite__btn">
                                    <button href="#">Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
     
                <x-sidebar-layout/>
            </div>
        </div>
    </div>
</x-front-layout>