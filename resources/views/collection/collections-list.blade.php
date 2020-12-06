@extends('layout')

@section('app-title', 'Collections')

@section('page-title', 'Collections')

@section('page-content')
    <div class="collections-list">
        <div class="container">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
