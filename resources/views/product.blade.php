@extends('layouts.master')

@isset($metatag->title)
    @section('title', $metatag->title)
@else
    @section('title', $product->name)
@endisset

@isset($metatag->description)
    @section('description', $metatag->description)
@else
    @section('description', '')
@endisset

@section('content')
    <div class="contayner_breadcrumb conteyner">
        <ul>
            <li><a href="{{ route('index') }}">@lang('main.sex_shop')</a></li>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            {{--    если есть родительская категория выводим её    --}}
            <li><a href="/category/{{ $parentcategory->code }}">{{ $parentcategory->__('name') }}</a></li>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <li><a href="/category/{{ $breadcrumbCategoryEnd->code }}">{{ $breadcrumbCategoryEnd->__('name') }}</a></li>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <li>{{ $product->__('name') }}</li>
        </ul>
    </div>
    <section class="detail_product conteyner grid">
        <div class="menu_vertical menu_vertical_detail_product">
            <ul>
                {{--                                {{ dd($parentcategory) }}--}}
                <li class="active">
                    <a href="{{ route('subcategory',  $category->code) }}">
                        {{ $delimeter ?? '' }}{{  $category->__('name') }} {{--{{  $parentcategoryItem->children->count() }}--}}
                    </a>
                </li>
                @foreach( $category->children as  $parentcategoryItem)
                    {{--        {{ dd($parentcategory->id . ' ' . $parentcategoryItem->id) }}--}}

                    <li @if(request()->path() == $parentcategoryItem->code . '/' . $product->code) class="active" @endif>
                        <div class="circle_a grid">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <a href="{{ route('subcategory',  $parentcategoryItem->code) }}">
                                {{ $delimeter ?? '' }}{{  $parentcategoryItem->__('name') }} {{--{{  $parentcategoryItem->children->count() }}--}}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="all_product_detail">
            <div class="properties_product grid">
                <div class="img_detail_product">
                    <img src="{{ Storage::url($product->image) }}" alt="">
                </div>
                <div class="">
                    <h3 class="product_detail_name">{{ $product->__('name') }}</h3>
                    <div class="detail_product_description">
                        <p>
                            {{ $product->__('description') }}
                        </p>
                    </div>
                    <div class="features">
                        <ul>
                            <li>Бесконтактная стимуляция клитора вакуумом</li>
                            <li>Идеальная идея для подарка</li>
                            <li>1 год гарантии</li>
                            <li>11 скоростей стимуляции</li>
                            <li>Водонепроницаемый</li>
                            <li>Насадка для любого размера клитора</li>
                        </ul>
                    </div>
                    <div class="price_availability_code grid">
                        <div class="price">
                            <span class="product_detail_price">{{ $product->price }}</span>
                            <span class="currency"> {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</span>
                        </div>
                        <div class="code_availability">
                            <div class="code">
                                <span>Код товара:</span>
                                <span>56187</span>
                            </div>
                            <div class="availability">
                                <span>Доступно:</span>
                                <span>На складе</span>
                            </div>
                        </div>
                    </div>
                    <div class="product_detail_color grid">
                        <span>Цвет:</span>
                        <div class="choice_color">
                            <div></div>
                        </div>
                    </div>
                    <div class="product_detail_basket">
                        @if($product->isAvailable())
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <div class="cnt_product grid">
                                    <input type="text" value="1" class="input_cnt_product" disabled>
                                    <div class="button_add_subtract grid">
                                        <i class="fa fa-angle-up button_add" aria-hidden="true"></i>
                                        <i class="fa fa-angle-down button_subtract" aria-hidden="true"></i>
                                    </div>
                                    <div class="add_product_submit">
                                        <button>@lang('main.buy')</button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        @else
                            <div class="no_tovar">
                                <span class="not_available">Не доступен</span>
                                <span class="report_appearance">Сообщить о появлении товара?</span>
                            </div>
                            <span class="warning">
                                @if($errors->get('email'))
                                    {!!   $errors->get('email')[0] !!}
                                @endif
                            </span>
                            <form method="POST" action="{{ route('subscription', $product) }}">
                                @csrf
                                <input type="text" name="email" class="report_appearance_input">
                                <button class="report_appearance_button" type="submit">Отправить</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
            <div class="specifications">
                <h3 class="nav-tabs">@lang('main.specifications')</h3>
                <p>{{ $product->__('description') }}</p>
            </div>
        </div>
    </section>
@endsection
