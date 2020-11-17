<!-- HEADER -->
<header id="header">
    @include('parts.navigation')

    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url('/{{$post->header_image}}');" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        @foreach($post->category->all() as $category)
                        <a href="/{{$category->name}}">{{$category->name}}</a>
                            @endforeach
                    </div>
                    <h1>{{$post->title}}</h1>
                    <ul class="post-meta">
                        @if($post->user->visibility !== 'hidden')
                        <li><a href="/#">{{$post->user->name}}</a></li>
                        @endif
                        <li>{{date('d.m.Y', strtotime($post->created_at))}}</li>
                        <li><i class="far fa-clock"></i>&nbsp;{{$post->time_to_read}} <span class="text-lowercase">мин</span></li>
                        {{--<li><i class="fa fa-comments"></i> 3</li>--}}
                        <li><i class="far fa-eye"></i>&nbsp;{{$post->views}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->