@extends('layouts.main', ['title' => $post->title, 'description' => $post->description])

@section('script')
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

    <script type="text/javascript">
        VK.init({apiId: 6833352, onlyWidgets: true});
    </script>
    @endsection
@section('content')
    @include('parts.header-post')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">

                <!-- post share -->
                <div class="section-row">

                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,pocket,whatsapp,telegram" data-counter=""></div>

                </div>
                <!-- /post share -->

                <!-- post content -->
                <div class="section-row" id="post-content">
                    {!! html_entity_decode($post->content)!!}
                </div>
                <!-- /post content -->

                <!-- post share -->
                <div class="section-row">

                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,pocket,whatsapp,telegram" data-counter=""></div>

                </div>
                <!-- /post share -->

                <!-- post tags -->
                <div class="section-row">
                    <div class="post-tags">
                        <ul>
                            <li>ТЕГИ:</li>
                            @foreach($post->tag->all() as $tag)
                            <li><a href="/tag/{{$tag->slug}}">{{$tag->name}}</a></li>
                                @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /post tags -->

                <!-- post nav -->
                <div class="section-row">
                    <div class="post-nav">
@if($previousPost)
                        <div class="prev-post">
                            <a class="post-img" href="/post/{{$previousPost->slug}}"><img src="/{{$previousPost->sm_image}}" alt=""></a>
                            <span>Предыдущий пост</span>
                            <h3 class="post-title"><a href="/post/{{$previousPost->slug}}">{{$previousPost->title}}</a></h3>

                        </div>
                        @endif
@if($nextPost)
                        <div class="next-post">
                            <a class="post-img" href="/post/{{$nextPost->slug}}"><img src="/{{$nextPost->sm_image}}" alt=""></a>
                            <span>Следующий пост</span>
                            <h3 class="post-title"><a href="/post/{{$nextPost->slug}}">{{$nextPost->title}}</a></h3>

                        </div>
    @endif
                    </div>
                </div>
                <!-- /post nav  -->

                <!-- post author -->
                {{--<div class="section-row">--}}
                    {{--<div class="section-title">--}}
                        {{--<h3 class="title">Автор поста: <a href="author/{{$post->user->id}}">{{$post->user->name}}</a></h3>--}}
                    {{--</div>--}}
                    {{--<div class="author media">--}}
                        {{--<div class="media-left">--}}
                            {{--<a href="/author/{{$post->user->id}}">--}}
                                {{--<img class="author-img media-object" src="{{substr($post->user->avatar,30)}}" alt="">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="media-body">--}}
                            {{--<p>{{$post->user->about}}</p>--}}
                            {{--<ul class="author-social">--}}
                                {{--<li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /post author -->

                <!-- /Связанные посты -->
                @if($relatedPosts->isNotEmpty())
                <div>
                    <div class="section-title">
                        <h3 class="title">Связанные посты</h3>
                    </div>
                    <div class="row">
                        @foreach($relatedPosts as $relPost)
                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="/post/{{$relPost->slug}}"><img src="/{{$relPost->md_image}}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        @foreach($relPost->category->all() as $category)
                                            <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                        @endforeach
                                    </div>
                                    <h3 class="post-title title-sm"><a href="/post/{{$relPost->slug}}">{{$relPost->title}}</a></h3>
                                    <ul class="post-meta">
                                        @if($relPost->user->visibility != 'hidden')
                                        <li><a href="/author/{{$relPost->user->id}}">{{$relPost->user->name}}</a></li>
                                        @endif
                                        <li>{{date('d.m.Y', strtotime($relPost->created_at))}}</li>
                                        <li><i class="far fa-clock"></i>&nbsp;{{$relPost->time_to_read}} <span class="text-lowercase">мин</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                        @endforeach
                    </div>
                </div>
                <!-- /Связанные посты -->
                @endif
                {{--<!-- post comments -->--}}
            <!-- Put this div tag to the place, where the Comments block will be -->
                <div id="vk_comments"></div>
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
                </script>
                {{--<!-- /post comments -->--}}

                {{--<!-- post reply -->--}}

                {{--<!-- /post reply -->--}}
            </div>
            @include('parts.aside')
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->






    @include('parts.footer')
@endsection
