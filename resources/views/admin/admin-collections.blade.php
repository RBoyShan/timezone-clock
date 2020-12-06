@extends('layout')

@section('app-title', 'Admin collections')

@section('page-title', 'Admin collections')

@section('page-content')
    <div class="admin-panel">
        <div class="container">
            <div class="admin-panel__top-bar">
                <h2 class="admin-panel__title">
                    {{ __('Admin Shop Collections') }}
                </h2>

                <a class="button button--action admin-panel__add-button" href="/collections/create">
                    {{ __('Add Collection') }}
                </a>
            </div>

            <div class="admin-panel__content">
                @foreach($collections as $collection)
                    <div class="admin-panel__item-card">
                        <div class="admin-panel__item-card-image-wrapper admin-panel__item-card-image-wrapper--collection">
                            <img
                                class="admin-panel__item-card-image"
                                src="{{ $collection->image_src }}"
                                alt="{{ $collection->name }}"
                            />
                        </div>

                        <p class="admin-panel__item-card-title">
                            {{ $collection->name }}
                        </p>

                        <a class="button button--action" href="/collections/{{ $collection->id }}/edit">
                            {{ __('Edit Collection') }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
