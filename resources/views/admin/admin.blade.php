@extends('layout')

@section('app-title', 'Admin panel')

@section('page-title', 'Admin panel')

@section('page-content')
    <div class="admin-panel">
        <div class="container">
            <div class="admin-panel__top-bar">
                <h2 class="admin-panel__title">
                    {{ __('Admin Panel') }}
                </h2>
            </div>

            <div class="admin-panel__category">
                <div class="admin-panel__category-item">
                    <a class="admin-panel__category-item-link" href="/admin/products">
                        <img
                            class="admin-panel__category-item-image"
                            src="https://cdn.shopify.com/s/files/1/0070/7032/files/shopify-product-sourcing.jpg?v=1598457732&width=1024"
                            alt="admin-products"
                        />

                        <span class="admin-panel__category-item-overlay">
                            {{ __('Admin Products') }}
                        </span>
                    </a>
                </div>

                <div class="admin-panel__category-item">
                    <a class="admin-panel__category-item-link" href="/admin/collections">
                        <img
                            class="admin-panel__category-item-image"
                            src="https://cdn.shopify.com/s/files/1/0070/7032/files/trending-products-to-sell.jpg?v=1597956769"
                            alt="admin-products"
                        />

                        <span class="admin-panel__category-item-overlay">
                            {{ __('Admin Collections') }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
