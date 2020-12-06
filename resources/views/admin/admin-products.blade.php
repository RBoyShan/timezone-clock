@extends('layout')

@section('app-title', 'Admin products')

@section('page-title', 'Admin products')

@section('page-content')
    <div class="admin-panel">
        <div class="container">
            <div class="admin-panel__top-bar">
                <h2 class="admin-panel__title">
                    {{ __('Admin Shop Products') }}
                </h2>

                <a class="button button--action admin-panel__add-button" href="/collection/0/product/create">
                    {{ __('Add Product') }}
                </a>
            </div>

            <div class="admin-panel__content">
                @foreach($products as $product)
                    <div class="admin-panel__item-card">
                        <div class="admin-panel__item-card-image-wrapper">
                            <img
                                class="admin-panel__item-card-image"
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                            />
                        </div>

                        <p class="admin-panel__item-card-title">
                            {{ $product->name }}
                        </p>

                        <a class="button button--action" href="/collection/0/product/{{ $product->id }}/edit">
                            {{ __('Edit Product') }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
