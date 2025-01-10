<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
    <div class="wn__sidebar">
        <!-- Start Single Widget -->
        <aside class="widget search_widget">
            <h3 class="widget-title">بحث</h3>
            <form action="{{route('front.search')}}" method="POST">
                @csrf
                <div class="form-input">
                    <input type="text" placeholder="بحث..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </aside>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <aside class="widget recent_widget">
            <h3 class="widget-title">مقالات حديثة</h3>
            <div class="recent-posts">
                <ul>
                    @foreach ($posts as $post)
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="blog-details.html"><img src="{{$post->image_url}}" alt="blog images"></a>
                            </div>
                            <div class="content">
                                <h4><a href="blog-details.html">{{$post->title}}</a></h4>
                                <p>	{{\Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <aside class="widget comment_widget">
            <h3 class="widget-title">تعليقات المستخدمين</h3>
            <ul>
                @foreach ($comments as $comment)
                <li>
                    <div class="post-wrapper">
                        <div class="thumb">
                            <img src="{{asset('frontend/images/blog/comment/1.jpeg')}}" alt="Comment images">
                        </div>
                        <div class="content">
                            <p>{{$comment->name}} says:</p>
                            <a href="#">{{$comment->comment}}...</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </aside>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <aside class="widget category_widget">
            <h3 class="widget-title">اقسام</h3>
            <ul>
                @foreach ($categories as $cat)
                <li><a href="{{route('front.category.show',$cat->slug)}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
        </aside>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <aside class="widget archives_widget">
            <h3 class="widget-title">ارشيف</h3>
            <ul>
                <li><a href="#">مارس 2015</a></li>
                <li><a href="#">ابريل 2014</a></li>
                <li><a href="#">سبتمبر 2014</a></li>
                <li><a href="#">دسبمر 2014</a></li>
                <li><a href="#">اكتوبر 2014</a></li>
            </ul>
        </aside>
        <!-- End Single Widget -->
    </div>
</div>