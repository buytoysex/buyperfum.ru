@extends('layouts.master')

@section('title', 'Все категории')

@section('content')
    <div class="contayner_breadcrumb conteyner">
        <ul>
            <li><a href="{{ route('index') }}">@lang('main.sex_shop')</a></li>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            {{--    если есть родительская категория выводим её    --}}
            @isset($parentcategory)
                <li><a href="/category/{{ $parentcategory->code }}">{{ $parentcategory->__('name') }}</a></li> <i
                    class="fa fa-angle-right" aria-hidden="true"></i>
            @endisset
            <li>{{ $breadcrumbCategoryEnd->__('name') }}</li>
        </ul>
    </div>
    <section class="section_card conteyner grid">
        <div class="menu_vertical">
            <ul>
                {{--                                {{ dd($parentcategory) }}--}}
                <li class="active">
                    <a href="{{ route('subcategory',  $category->code) }}">
                        {{ $delimeter ?? '' }}{{  $category->__('name') }} {{--{{  $parentcategoryItem->children->count() }}--}}
                    </a>
                </li>
                @foreach( $category->children as  $parentcategoryItem)
                    {{--        {{ dd($parentcategory->id . ' ' . $parentcategoryItem->id) }}--}}

                    <li @if(request()->path() == 'category/'. $parentcategoryItem->code) class="active" @endif>
                        <div class="circle_a grid">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <a href="{{ route('subcategory',  $parentcategoryItem->code) }}">
                                {{ $delimeter ?? '' }}{{  $parentcategoryItem->__('name') }} {{--{{  $parentcategoryItem->children->count() }}--}}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{--        @include('layouts.menucategories')--}}
        </div>
        <div class="card grid">
            @isset($parentcategory)
                @foreach($breadcrumbCategoryEnd->products as $product)
                    <div class="product">
                        <div class="label">
                            @if($product->isNew())
                                <img src="{{ Storage::url('label/new.png') }}" alt="" class="label_img">
                            @endif
                            @if($product->isRecommend())
                                <img src="{{ Storage::url('label/reccomend_3.png') }}" alt="" class="label_img">
                            @endif
                            @if($product->isHit())
                                <img src="{{ Storage::url('label/hit.png') }}" alt="" class="label_img">
                            @endif
                        </div>
                        <div class="box">
                            <img
                                src="{{ Storage::url($product->image) }}"
                                alt="">
                        </div>
                        <div class="name_product">
                            <h3>
                                <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}">{{ $product->name }}</a>
                            </h3>
                        </div>
                        <div class="add_product grid">
                            <div class="price">{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</div>
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                @if($product->isAvailable())
                                    <button type="submit" class="add" role="button">В корзину</button>
                                @else
                                    Не доступен
                                @endif
                                {{--                            <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $hitProduct->category->code, $hitProduct->code]) }}"--}}
                                {{--                               class="btn btn-default"--}}
                                {{--                               role="button">Подробнее</a>--}}
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($category->children as $category)
                    @foreach($category->products as $product)
                        <div class="product">
                            <div class="label">
                                @if($product->isNew())
                                    <img src="{{ Storage::url('label/new.png') }}" alt="" class="label_img">
                                @endif
                                @if($product->isRecommend())
                                    <img src="{{ Storage::url('label/reccomend_3.png') }}" alt="" class="label_img">
                                @endif
                                @if($product->isHit())
                                    <img src="{{ Storage::url('label/hit.png') }}" alt="" class="label_img">
                                @endif
                            </div>
                            <div class="box">
                                <img
                                    src="{{ Storage::url($product->image) }}"
                                    alt="">
                            </div>
                            <div class="name_product">
                                <h3>
                                    <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}">
                                        {{ $product->__('name') }}
                                    </a>
                                </h3>
                            </div>
                            <div class="add_product grid">
                                <div class="price">{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</div>
                                <form action="{{ route('basket-add', $product) }}" method="POST">
                                    @if($product->isAvailable())
                                        <button type="submit" class="add" role="button">В корзину</button>
                                    @else
                                        Не доступен
                                    @endif
                                    {{--                            <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $hitProduct->category->code, $hitProduct->code]) }}"--}}
                                    {{--                               class="btn btn-default"--}}
                                    {{--                               role="button">Подробнее</a>--}}
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endisset
        </div>
    </section>
@endsection

