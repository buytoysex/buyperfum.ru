@extends('layouts.master')

@section('title', 'Все категории')

@section('content')
    <section class="section_card conteyner grid">
        <div class="menu_vertical">
            <h3>Категории</h3>
            <ul>
                @foreach($categories as $category)
                    <li @if(request()->path() == 'category/'. $category->code) class="active" @endif>
                        <div class="circle_a grid">
                            <a href="{{ route('subcategory',  $category->code) }}">
                                {{ $delimeter ?? '' }}{{  $category->name }} {{--{{  $parentcategoryItem->children->count() }}--}}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card grid">
            <h3 class="card_name">Категории</h3>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="/category/vibratory">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
            <div class="category">
                <div class="img_category_card">
                    <img src="https://s79983.cdn.ngenix.net/system/images/000/414/609/uo_product_big/funnypanda6345.jpg"
                         alt="">
                </div>
                <div class="name_category_card">
                    <h3>
                        <a href="">Фалоэмитаторы</a>
                    </h3>
                </div>
            </div>
        </div>
    </section>
@endsection
