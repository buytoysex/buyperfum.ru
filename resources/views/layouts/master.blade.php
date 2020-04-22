<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Первый интерент магазин на Laravel</title>
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    @if(strpos($_SERVER['REQUEST_URI'], 'basket') !== false)
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/starter-template.css" rel="stylesheet">
    @endif
    {{--    <script src="/js/jquery.min.js"></script>--}}
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<header class="">
    <div class="info grid conteyner">
        <div class="phone">
            <ul>
                <li>
                    <a href="tel:+78142332211">+7(814)-233-22-11</a>
                </li>
            </ul>
        </div>
        <div class="authorization el_end">
            <ul>

                <li class="li_valuta">{{$currencySymbol}}
                    <ul class="ul_valuta">
                        @foreach($currencies as $currency)
                            <li>
                                <a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.current_lang')</a>
                </li>
                @guest
                    <li><a href="{{ route('login') }}">@lang('main.enter')</a></li>
                @endguest

                @auth
                    @admin
                    <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                @else
                    <li><a href="{{ route('person.orders.index') }}">Мои заказы</a></li>
                    @endadmin
                    <li><a href="{{ route('get-logout') }}">@lang('main.go_out')</a></li>
                @endauth
            </ul>
        </div>
    </div>
    <hr>
    <div class="conteyner header_menu_button">
        <nav class="grid menu_header">
            <ul class="grid">
                <li class="">
                    <a href="/">
                        <img src="{{ Storage::url('logo.png') }}" alt="Логотип сайта SexRush.ru" class="logo">
                    </a>
                </li>

                @foreach($menu_categories as $category)
                    <li class="">
                        {{ $category->__('name') }}
                    </li>
                @endforeach
            </ul>
            <div class="basket grid border el_end">
                <div class="search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <p>{{ session('full_order_count') }} @lang('main.products') |&nbsp;</p>
                <p> {{ session('full_order_sum') }} @lang('main.currency')</p>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </nav>
        <div class="hidden_button">
            <input type="checkbox" name="menu" id="btn-menu"/>
            <label for="btn-menu" class="nav">
                <i class="fa fa-align-justify" aria-hidden="true"></i>
            </label>
        </div>
    </div>
</header>
<hr>
<div class="success_warning conteyner">
    @if(session()->has('success'))
        <p class="success">{{ session()->get('success') }}</p>
    @endif
    @if(session()->has('warning'))
        <p class="warning">{{ session()->get('warning') }}</p>
    @endif
</div>
@yield('content')

<footer>
    <section class="footer conteyner grid">
        <div class="menu_vertical">
            <h3>@lang('main.categories')</h3>
            <ul>
                @foreach($menu_categories as $category)
                    <li @if(request()->path() == 'category/'. $category->code) class="active" @endif>
                        <div class="circle_a grid">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <a href="{{ route('subcategory',  $category->code) }}">
                                {{ $delimeter ?? '' }}{{  $category->__('name') }} {{--{{  $parentcategoryItem->children->count() }}--}}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="popular_product">
            <h3>Самые популярные товары</h3>
            <ul>
                @foreach($bestProducts as $product)
                    <li>
                        <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $product->category->code, $product->code]) }}">{{ $product->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="copyright">
            &#169; 2020
            <p>
                <a href="{{ route('clear') }}">Очистить кэш</a>
            </p>
        </div>
    </section>
</footer>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/script.js"></script>
</body>
</html>
