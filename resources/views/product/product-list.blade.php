@extends('layout')

@section('app-title', 'Product list')

@section('page-title')
    {{ $page_title }}
@endsection

@section('page-content')
    <div class="product-list">
        <div class="container">
            <div class="product-list__container">

                @foreach($products as $product)
                    <div class="product-list__item">
                        <a class="product-list__item-image-wrapper" href="#">
                            <img class="product-list__item-image"
                                 src="{{ $product->image }}"
                                 alt="{{ $product->name }}"
                            />
                        </a>

                        <a class="product-list__item-title" href="#">
                            {{ $product->name }}
                        </a>

                        <h6 class="product_list__item-manufacturer">
                            {{ $product->manufacturer }}
                        </h6>

                        <p class="product-list__item-price">
                            $ {{ $product->price }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection