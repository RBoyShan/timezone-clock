@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Список товарів')

@section('page-content')
    <div class="product-list">
        <div class="container">
            <div class="product-list__container">
                <div class="product-list__item">
                    <div class="product-list__item-image-wrapper">
                        <img class="product-list__item-image"
                             src="https://d1rkccsb0jf1bk.cloudfront.net/products/100035633/main/medium/AX2716_main.jpg"
                             alt="Mens Armani Exchange Cayde Watch AX2716"
                        />
                    </div>

                    <h5 class="product-list__item-title">
                        Mens Armani Exchange Cayde Watch AX2716
                    </h5>

                    <h6 class="product_list__item-manufacturer">
                        Armani Exchange
                    </h6>

                    <p class="product-list__item-price">
                        €197.51
                    </p>
                </div>

                <div class="product-list__item">
                    <div class="product-list__item-image-wrapper">
                        <img class="product-list__item-image"
                             src="https://d1rkccsb0jf1bk.cloudfront.net/products/100039284/main/medium/so28n101_Web2.jpg"
                             alt="Unisex Swatch Sigan Watch SO28N101"
                        />
                    </div>

                    <h5 class="product-list__item-title">
                        Unisex Swatch Sigan Watch SO28N101
                    </h5>

                    <h6 class="product_list__item-manufacturer">
                        Swatch
                    </h6>

                    <p class="product-list__item-price">
                        €64.00
                    </p>
                </div>

                <div class="product-list__item">
                    <div class="product-list__item-image-wrapper">
                        <img class="product-list__item-image"
                             src="https://d1rkccsb0jf1bk.cloudfront.net/products/100039283/main/medium/so28b100_Web2.jpg"
                             alt="Unisex Swatch Masa Watch SO28B100"
                        />
                    </div>

                    <h5 class="product-list__item-title">
                        Unisex Swatch Masa Watch SO28B100
                    </h5>

                    <h6 class="product_list__item-manufacturer">
                        Swatch
                    </h6>

                    <p class="product-list__item-price">
                        €64.00
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
