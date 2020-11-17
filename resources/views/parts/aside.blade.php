<div class="col-md-4">
    <!-- ad widget-->
    <div class="aside-widget text-center">
        <a href="#" style="display: inline-block;margin: auto;">
            <img class="img-responsive" src="{{asset('./img/ad-3.jpg')}}" alt="">
        </a>
    </div>
    <!-- /ad widget -->

    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Соцсети</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-vk">
                        <i class="fab fa-vk"></i>
                        <span>10.2K<br>Подписчиков</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-instagram">
                        <i class="fab fa-instagram"></i>
                        <span>5K<br>Подписчиков</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>21.2K<br>Подписчиков</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Категории</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach($allCategories->sortByDesc('quantity')->all() as $category)
                    <li><a href="/category/{{$category->slug}}">{{$category->name}} <span>{{$category->quantity}}</span></a></li>
                    @endforeach

            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- newsletter widget -->
    {{--<div class="aside-widget">--}}
        {{--<div class="section-title">--}}
            {{--<h2 class="title">Рассылка</h2>--}}
        {{--</div>--}}
        {{--<div class="newsletter-widget">--}}
            {{--<form>--}}
                {{--<p>Подпишитесь на нашу рассылку!</p>--}}
                {{--<input class="input" name="newsletter" placeholder="Введите ваш Email">--}}
                {{--<button class="primary-button" id="aside-newsletter-button">Подписаться</button>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}


    <!-- /newsletter widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Популярные посты</h2>
        </div>

        @foreach($popular5Posts as $post)
            <!-- post -->
                <div class="post post-widget">
                    <a class="post-img" href="/post/{{$post->slug}}"><img src="/{{$post->sm_image}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            @foreach($post->category->all() as $category)
                                <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                        <h3 class="post-title"><a href="post/{{$post->slug}}">{{$post->title}}</a></h3>
                    </div>
                </div>
                <!-- /post -->
            @endforeach



    </div>
    <!-- /post widget -->
</div>