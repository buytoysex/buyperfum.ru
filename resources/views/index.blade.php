@extends('layouts.master')

@section('title', 'Главная')

@section('content')
    <section class="conteyner main grid">
        <div class="slider">
            <img
                src="{{ Storage::url('wom_prem_838.jpg') }}"
                alt="">
        </div>
        <div class="sidebar_left border">

        </div>
    </section>
    <section class="conteyner sales_hits">
        <div class="sales_hits_arrows grid">
            <h3>@lang('main.sales_hits')</h3>
            <div class="slider-arrows"></div>
        </div>
        <div class="slider_product">
            {{--            {{ dd($hitProducts) }}--}}
            @foreach($hitProducts as $hitProduct )
                <div class="product">
                    <div class="label">
                        @if($hitProduct->isNew())
                            <img src="{{ Storage::url('label/new.png') }}" alt="" class="label_img">
                        @endif
                        @if($hitProduct->isRecommend())
                            <img src="{{ Storage::url('label/reccomend_3.png') }}" alt="" class="label_img">
                        @endif
                        @if($hitProduct->isHit())
                            <img src="{{ Storage::url('label/hit.png') }}" alt="" class="label_img">
                        @endif
                    </div>
                    <div class="box">
                        <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $hitProduct->category->code, $hitProduct->code]) }}">
                            <img src="{{ Storage::url($hitProduct->image) }}" alt="">
                        </a>
                    </div>
                    <div class="name_product">
                        <h3>
                            <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $hitProduct->category->code, $hitProduct->code]) }}">
                                {{ $hitProduct->__('name') }}
                            </a>
                        </h3>
                    </div>
                    <div class="add_product grid">
                        <div class="price">{{ $hitProduct->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</div>
                        <form action="{{ route('basket-add', $hitProduct) }}" method="POST">
                            @if($hitProduct->isAvailable())
                                <button type="submit" class="add" role="button">@lang('main.in_basket')</button>
                            @else
                                @lang('main.not_available')
                            @endif
                            {{--                            <a href="{{ route('product', [isset($subcategory) ? $subcategory->code : $hitProduct->category->code, $hitProduct->code]) }}"--}}
                            {{--                               class="btn btn-default"--}}
                            {{--                               role="button">Подробнее</a>--}}
                            @csrf
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section_card conteyner grid">
        <div class="menu_vertical">
            <h3>@lang('main.categories')</h3>
            <ul>
                @foreach($categories as $category)
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
        <div class="card grid">
            <h3 class="card_name">Категории</h3>
            @foreach($categories as $category)
                <div class="category grid">
                    <div class="img_category_card">
                        <img
                            src="{{ Storage::url($category->image) }}"
                            alt="">
                    </div>
                    <div class="name_category_card">
                        <h3>
                            <a href="">{{ $category->__('name') }}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
