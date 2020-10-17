@extends('layout')

@section('app-title', 'Product list')

@section('page-title')
    {{ $product->name }}
@endsection


@section('page-content')
    <div class="product-details">
        <div class="container">
            <div class="product-details__content">
                <div class="product-details__media">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="product-details__media-image"
                    />
                </div>

                <div class="product-details__information">
                    <h2 class="product-details__title">
                        {{ $product->name }}
                    </h2>

                    <h6 class="product-details__manufacturer">
                        {{ $product->manufacturer }}
                    </h6>

                    <p class="product-details__price">
                        $ {{ $product->price }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
