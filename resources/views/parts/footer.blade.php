
<!-- FOOTER -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{route('index')}}" class="logo"><img src="{{asset('./img/logo-alt.png')}}" alt=""></a>
                    </div>
                    <p>Блог HumanTalk.ru {{date('Y')}} <i class="far fa-copyright"></i></p>
                    <ul class="contact-social">
                        <li><a href="#" class="social-vk"><i class="fab fa-vk"></i></a></li>
                        <li><a href="#" class="social-facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="social-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#" class="social-instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Categories</h3>
                    <div class="category-widget">
                        <ul>
                            @foreach($allCategories as $category)
                                <li><a href="/category/{{$category->slug}}">{{$category->name}} <span>{{$category->quantity}}</span></a></li>
                                @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Теги</h3>
                    <div class="tags-widget">
                        <ul>
                            @foreach($allTags->random(10) as $tag)
                                <li><a href="/tag/{{$tag->slug}}">{{$tag->name}}</a></li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Подписка</h3>
                    <div class="newsletter-widget">
                        <form>
                            <p>Подпишитесь на нашу рассылку</p>
                            <input class="input" disabled name="newsletter" placeholder="Ваш Email">
                            <button class="primary-button" >Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="footer-bottom row">
            <div class="col-md-6 col-md-push-6">
                <ul class="footer-nav">
                    <li><a href="{{route('index')}}">Главная</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Реклама</a></li>
                    <li><a href="#">Права</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-md-pull-6">
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fas fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->


</footer>
<!-- /FOOTER -->