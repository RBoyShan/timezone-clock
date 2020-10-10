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
                            <div class="product-list__item-image-wrapper">
                                <img class="product-list__item-image"
                                     src="{{ $product->getImage() }}"
                                     alt="{{ $product->getName() }}"
                                />
                            </div>

                            <h5 class="product-list__item-title">
                                {{ $product->getName() }}
                            </h5>

                            <h6 class="product_list__item-manufacturer">
                                {{ $product->getManufacturer() }}
                            </h6>

                            <p class="product-list__item-price">
                                {{ $product->getPrice() }}
                            </p>
                        </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
