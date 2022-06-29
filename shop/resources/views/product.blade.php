
@php
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    $dif = time() - strtotime($Product->Delivered_date);
    //Product has arrived $day ago
    $day = floor($dif/86400);
    $User = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$Product->Name}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/styles/product.css">
    <link rel="stylesheet" type="text/css" href="/styles/product_responsive.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="/">Варточка.</a></div>
                            <nav class="main_nav">
                                <ul>
                                    <li>
                                        <a href="{{route('catalog')}}">Каталог</a>
                                    </li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    @if(Auth::check())
                                        <li><a href="{{route('profile')}}">Профиль </a> / <a href="{{route('logout')}}"> Выйти</a></li>
                                    @else
                                        <li><a href="{{route('login')}}">Войти </a> / <a href="{{route('register')}}"> Регистрация</a></li>
                                    @endif
                                    <li></li>
                                </ul>
                            </nav>
                            <div class="header_extra ml-auto">
                                <div class="shopping_cart">
                                    <a href="{{route('cart')}}">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
												<g>
                                                    <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" />
                                                </g>
											</svg>
                                        <div>Корзина<span>({{$ProductsAmount}})</span></div>
                                    </a>
                                </div>
                                <div class="search">
                                    <div class="search_icon">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;" xml:space="preserve">
												<g>
                                                    <path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
												c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
												C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
												c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
												c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
												c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
												c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
												 M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
												c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
												c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
												" />
                                                </g>
											</svg>
                                    </div>
                                </div>
                                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Panel -->
        <div class="search_panel trans_300">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                            <form action="#">
                                <input type="text" class="search_input" placeholder="В доработке" required="required">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social -->

    </header>

    <!-- Menu -->

    <div class="menu menu_mm trans_300">
        <div class="menu_container menu_mm">
            <div class="page_menu_content">

                <div class="page_menu_search menu_mm">
                    <form action="#">
                        <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
                    </form>
                </div>
                <ul class="page_menu_nav menu_mm">
                    <li class="page_menu_item menu_mm">
                        <a href="/">Домашняя<i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="page_menu_item menu_mm">
                        <a href="{{route('catalog')}}">Каталог<i class="fa fa-angle-down"></i></a>
                    </li>
                    @if(Auth::check())
                        <li class="page_menu_item menu_mm"><a href="{{route('cart')}}">Корзина<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="{{route('profile')}}">Профиль<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="{{route('logout')}}">Выйти<i class="fa fa-angle-down"></i></a></li>
                    @else
                        <li class="page_menu_item menu_mm"><a href="{{route('login')}}">Войти<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item menu_mm"><a href="{{route('register')}}">Регистрация<i class="fa fa-angle-down"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>


    </div>

    <!-- Home -->

    <div class="home" style="height: 25px;">

    </div>

    <!-- Product Details -->
    <div class="product_details">
        <div class="container">
            <div class="row details_row">
                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large" data-image="/images/products/{{ $Product->VenCode }}/1.jpg"><img src="/images/products/{{$Product->VenCode}}/1.jpg" alt="">
                            @if ($day <= 7)
                                <div class="product_extra product_new"><a href="catalog">Новинка</a></div>
                            @endif
                        </div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-around">
                            <div class="details_image_thumbnail active" data-image="/images/products/{{ $Product->VenCode }}/1.jpg"><img src="/images/products/{{ $Product->VenCode }}/1.jpg" alt=""></div>

                            @for($i = 2; $i <= Controller::getFileCount($Product->VenCode);$i++)

                                <div class="details_image_thumbnail" data-image="/images/products/{{$Product->VenCode}}/{{$i}}.jpg"><img src="/images/products/{{$Product->VenCode}}/{{$i}}.jpg" alt=""></div>

                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$Product->Name}}</div>
                        <!--<div class="details_discount">$890</div>-->
                        <div class="details_price">{{$Product->Price}} руб</div>

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <span>В продаже</span>
                        </div>
                        <div class="details_text">
                            <p>{{$Product->Description}}</p>
                        </div>

                        <!-- Product Quantity -->
                        @if(Auth::check())
                        <form action="{{route('addToCart_process',$Product->VenCode)}}" method="POST" id="contact_form" class="contact_form">
                            @csrf
                            <div class="product_quantity_container">
                                <input type="hidden" id="User_id" name="User_id" value="{{$User->user_id}}">
                                <input type="hidden" id="Product_id" name="Product_id" value="{{$Product->Product_id}}">
                                <input type="hidden" id="Product_amount" name="Product_amount" value="1">
                                <input type="hidden" id="Total" name="Total" value="{{$Product->Price}}">
                                <!--<div class="product_quantity clearfix">
                                    <span>Кол<div class=""></div></span>
                                    <input id="quantity_input" type="text" pattern="[1-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                </div>-->
                                <button type="submit" class="button contact_button" name="sendMe"><span>Добавить</span></button>
                            </div>
                        </form>
                        @else
                            <form action="{{route('login')}}">
                                <div class="product_quantity_container">
                                    <button class="button contact_button"><span>Войти</span></button>
                                </div>
                            </form>
                        @endif
                        <!-- Share -->
                        <div class="details_share">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Описание</div>
                        <!--<div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>-->
                    </div>
                    <div class="description_text">
                        <hr>
                        <p>Артикул: {{$Product->VenCode}}</p>
                        <hr>
                        <p>Бренд: {{$Brand->Name}}</p>
                        <hr>
                        @if(!is_null($Product->Size))
                            <p>Размер: {{$Product->Size}}</p>
                            <hr>
                        @endif

                        <p>Возраст: {{$AgeAudience->Age}}</p>
                        <hr>
                        @if(!is_null($Product->Weight))
                            <p>Вес: {{$Product->Weight}}</p>
                            <hr>
                        @endif

                        @if(!is_null($Product->Packing_size))
                            <p>Размер упаковки: {{$Product->Packing_size}}</p>
                            <hr>
                        @endif

                        @if(!is_null($Product->Details_amount))
                            <p>Деталей: {{$Product->Details_amount}}</p>
                            <hr>
                        @endif
                        <p>Страна производитель: {{$Manufacturer->Name}}</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Новинки</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        <!-- Product -->
                        @foreach($Products as $var)
                            @php
                                $diff = time() - strtotime($var->Delivered_date);
                                $days = floor($diff/86400);
                            @endphp
                            @if($days <= 14	)
                                <div class="product">
                                    <div class="product_image"><a href="/product/{{$var->VenCode}}"><img src="/images/products/{{ $var->VenCode}}/1.jpg" alt=""></a></div>
                                    <div class="product_extra product_new"><a href="catalog">Новинка!</a></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="/product/{{$var->VenCode}}">{{$var->Name}}</a></div>

                                        <div class="product_price">
                                            <p>{{$var->Price}} Rub.</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Подпишитесь на нашу новостную повестку!</div>
                        <div class="newsletter_text">
                            <p>При подписке Вы будете знать о наших скидках, распродажах, а так-же уникальных товарах.</p>
                        </div>
                        <div class="newsletter_form_container">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required">
                                <button class="newsletter_button trans_200"><span>Подписаться</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer></footer>


    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/greensock/TweenMax.min.js"></script>
    <script src="/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="/js/product.js"></script></div>
</body>

</html>