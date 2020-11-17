@extends('layouts.main',['title' => ucfirst($title), 'description' => $category->description] )



@section('content')
    @include('parts.header-category')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    @if($posts->isEmpty())
                        <h3>Простите, в данной категории еще нет постов.</h3>
                        @else
                    @foreach($posts as $post)
                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="/post/{{$post->slug}}"><img src="/{{$post->md_image}}" alt=""></a>
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
                        {{$posts->links()}}
                        {{--<a href="#" class="primary-button">Load More</a>--}}
                    </div>

                        @endif
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

