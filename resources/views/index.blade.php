@extends('layouts.main',['title' => 'Блог о жизни', 'description' => 'Полезные статьи про отношения, личностный рост, как поддержать себя в форме и многе другое.'])

@section('content')
    @include('parts.header')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="/post/{{$mainPost->slug}}"><img src="{{$mainPost->lg_image}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            {{--Цикл с выводом категорий--}}
                            @foreach($mainPost->category->all() as $category)
                            <a href="/category/{{$category->name}}">{{$category->name}}</a>
                            @endforeach
                            {{--/Цикл с выводом категорий--}}
                        </div>
                        <h3 class="post-title title-lg"><a href="/post/{{$mainPost->slug}}">{{$mainPost->title}}</a></h3>
                        <ul class="post-meta">
                            @if($mainPost->user->visibility !== 'hidden')
                            <li><a href="/author/{{$mainPost->user->id}}">{{$mainPost->user->name}}</a></li>
                            @endif
                            <li>{{date('d.m.Y', strtotime($mainPost->created_at))}}</li>
                            <li><i class="far fa-clock"></i>&nbsp;{{$mainPost->time_to_read}} <span class="text-lowercase">мин</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <div class="col-md-4 hot-post-right">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="/post/{{$secondaryPost1->slug}}"><img src="{{$secondaryPost1->lg_image}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            {{--Цикл с выводом категорий--}}
                            @foreach($secondaryPost1->category->all() as $category)
                                <a href="/category/{{$category->name}}">{{$category->name}}</a>
                            @endforeach
                            {{--/Цикл с выводом категорий--}}
                        </div>
                        {{--TITLE--}}
                        <h3 class="post-title"><a href="/post/{{$secondaryPost1->slug}}">{{$secondaryPost1->title}}</a></h3>
                        {{--/TITLE--}}
                        <ul class="post-meta">
                            @if($secondaryPost1->user->visibility !== 'hidden')
                            <li><a href="/author/{{$secondaryPost1->user->id}}">{{$secondaryPost1->user->name}}</a></li>
                            @endif
                            <li>{{date('d.m.Y', strtotime($secondaryPost1->created_at))}}</li>
                            <li><i class="far fa-clock"></i>&nbsp;{{$secondaryPost1->time_to_read}} <span class="text-lowercase">мин</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="/post/{{$secondaryPost2->slug}}"><img src="{{$secondaryPost2->lg_image}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            {{--Цикл с выводом категорий--}}
                            @foreach($secondaryPost2->category->all() as $category)
                                <a href="/category/{{$category->name}}">{{$category->name}}</a>
                            @endforeach
                            {{--/Цикл с выводом категорий--}}
                        </div>
                        {{--TITLE--}}
                        <h3 class="post-title"><a href="/post/{{$secondaryPost2->slug}}">{{$secondaryPost2->title}}</a></h3>
                        {{--/TITLE--}}
                        <ul class="post-meta">
                            @if($secondaryPost2->user->visibility !== 'hidden')
                            <li><a href="/author/{{$secondaryPost2->user->id}}">{{$secondaryPost2->user->name}}</a></li>
                            @endif
                            <li>{{date('d.m.Y', strtotime($secondaryPost2->created_at))}}</li>
                            <li><i class="far fa-clock"></i>&nbsp;{{$secondaryPost2->time_to_read}} <span class="text-lowercase">мин</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                {{--Последние 4 поста--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Последние публикации</h2>
                        </div>
                    </div>

                    {{--/Последние 4 поста--}}
                    @foreach($last4Posts->chunk(2) as $chunk)

                        @foreach($chunk as $post)
                            <!-- post -->
                            <div class="col-md-6">
                                <div class="post">
                            <a class="post-img" href="/post/{{$post->slug}}"><img src="{{$post->md_image}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    @foreach($post->category->all() as $category)
                                    <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                        @endforeach
                                </div>
                                <h3 class="post-title"><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                                <ul class="post-meta">
                                    @if($post->user->visibility !== 'hidden')
                                    <li><a href="/author/{{$post->user->id}}">{{$post->user->name}}</a></li>
                                    @endif
                                    <li>{{date('d.m.Y', strtotime($post->created_at))}}</li>
                                        <li><i class="far fa-clock"></i>&nbsp;{{$post->time_to_read}} <span class="text-lowercase">мин</span></li>
                                </ul>
                            </div>
                        </div>
                            </div>
                                <!-- /post -->
                            @endforeach
                         <div class="clearfix visible-md visible-lg"></div>
                    @endforeach

                </div>
                <!-- /row -->

{{-- 3 случайные категории--}}
@foreach($last3PostsInEachCategory->random(3) as $array)
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{$array['title']}}</h2>
                        </div>
                    </div>
                    @foreach($array['posts'] as $post)

                    <!-- post -->
                    <div class="col-md-4">
                        <div class="post post-sm">
                            <a class="post-img" href="/post/{{$post->slug}}"><img src="{{$post->md_image}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    @foreach($post->category->all() as $category)
                                        <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                    @endforeach
                                </div>
                                <h3 class="post-title title-sm"><a href="post/{{$post->slug}}">{{$post->description}}</a></h3>
                                <ul class="post-meta">
                                    @if($post->user->visibility !== 'hidden')
                                    <li><a href="/author/{{$post->user->id}}">{{$post->user->name}}</a></li>
                                    @endif
                                    <li>{{date('d.m.Y', strtotime($post->created_at))}}
                                    <li><i class="far fa-clock"></i>&nbsp;{{$post->time_to_read}} <span class="text-lowercase">мин</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    @endforeach

                </div>
                <!-- /row -->
    @endforeach



            </div>
            @include('parts.aside')
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- РЕКЛАМНАЯ СЕКЦИЯ -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ad -->
            <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                    <img class="img-responsive" src="./img/ad-2.jpg" alt="">
                </a>
            </div>
            <!-- /ad -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /РЕКЛАМНАЯ СЕКЦИЯ -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- 3 поста на выбор с меткой 'interesting' -->
            @foreach($choose3Post as $post)
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title">{{$post->title}}</h2>
                    </div>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="/post/{{$post->slug}}"><img src="{{$post->md_image}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                @foreach($post->category->all() as $category)
                                    <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <h3 class="post-title"><a href="/post/{{$post->slug}}">{{$post->description}}</a></h3>
                            <ul class="post-meta">
                                @if($mainPost->user->visibility !== 'hidden')
                                <li><a href="/author/{{$post->user->id}}">{{$post->user->name}}</a></li>
                                @endif
                                <li>{{date('d.m.Y', strtotime($post->created_at))}}</li>
                                <li><i class="far fa-clock"></i>&nbsp;{{$post->time_to_read}} <span class="text-lowercase">мин</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                @endforeach
        </div>
        <!-- /row -->

        <!-- row -->

        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">

                @foreach($allPosts as $post)
                    <!-- post -->
                        <div class="post post-row">
                            <a class="post-img" href="/post/{{$post->slug}}"><img src="{{$post->md_image}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    @foreach($post->category->all() as $category)
                                        <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                                    @endforeach
                                </div>
                                <h3 class="post-title"><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                                <ul class="post-meta">
                                    @if($post->user->visibility !== 'hidden')
                                    <li><a href="/author/{{$post->user->id}}">{{$post->user->name}}</a></li>
                                    @endif
                                    <li>{{date('d.m.Y', strtotime($post->created_at))}}</li>
                                    <li><i class="far fa-clock"></i>&nbsp;{{$post->time_to_read}} <span class="text-lowercase">мин</span></li>
                                </ul>
                                <p>{{$post->description}}</p>
                            </div>
                        </div>
                        <!-- /post -->
                    @endforeach

                <div class="section-row loadmore text-center">
                    {{$allPosts->links()}}
                    {{--<a href="#" class="primary-button">Load More</a>--}}
                </div>


            </div>
            @include('parts.aside2')
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@include('parts.footer')
    @endsection


