@extends('layout')

@section('app-title', 'Collections')

@section('page-title', 'Collections')

@section('page-content')
    <div class="collections-list">
        <div class="container">

            <a class="button button--action collections-list__button" href="/collections/create">Add Collection</a>

            <div class="collections-list__container">

                @foreach($collections as $collection)
                    <div class="collections-list__item">
                        <a class="collections-list__item-image-wrapper" href="collection/{{ $collection->id }}/product">
                            <img class="collections-list__item-image"
                                 src="{{ $collection->image_src }}"
                                 alt="{{ $collection->name }}"
                            />

                            <div class="overlay collections-list__item-overlay">
                                <p class="collections-list__item-title">
                                    {{ $collection->name }}
                                </p>
                            </div>
                        </a>

                        <a class="button button--action collections-list__button" href="collections/{{ $collection->id }}/edit">Edit Collection</a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
