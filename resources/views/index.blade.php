@extends('layout')

@section('app-title', 'Watches')

@section('page-title', 'Home')

@section('page-content')
    <section class="main-banner">
        <div class="main-banner__container">
           <div class="container">
               <div class="main-banner__content">
                   <div class="main-banner__text-content">
                       <h3 class="main-banner__title">
                           {{ __('Select Your New Perfect Style With Skeleton') }}
                       </h3>

                       <p class="main-banner__description">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos,
                           ducimus eaque eos maxime neque nesciunt obcaecati odit optio unde voluptatum!
                       </p>

                       @foreach(\App\Collection::all()->where('name', 'Skeleton')->take(1) as $collection)
                           <a class="button button--action" href="collection/{{ $collection->id }}/product">
                               {{ __('Watch Collection') }}
                           </a>
                       @endforeach
                   </div>

                   <div
                       class="main-banner__image-wrapper"
                       data-animation="bounceIn"
                       data-delay=".4s">
                       <img
                           class="main-banner__image"
                           src="{{ asset('images/homepage/watch.png') }}"
                           alt="Skeleton"
                       />
                   </div>
               </div>
           </div>
        </div>
    </section>

    <section class="featured-collections">
        <div class="container">
            <h2 class="section-heading">
                {{ __('New Collections') }}
            </h2>

            <div class="featured-collections__wrapper">
                @foreach($collections as $collection)
                    <div class="featured-collections__item">
                        <a class="featured-collections__image-link" href="collection/{{ $collection->id }}/product">
                            <img
                                class="featured-collections__image"
                                src="{{ $collection->image_src }}"
                                alt="{{ $collection->name }}"
                            />
                        </a>

                        <a class="featured-collections__item-title" href="collection/{{ $collection->id }}/product">
                            {{ $collection->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="gallery__container">
            <div class="gallery__image-wrapper gallery__image-wrapper--big-image">
                <img
                    class="gallery__image"
                    src="{{ asset('images/gallery/gallery1.png') }}"
                    alt="big-image"
                />
            </div>

            <div class="gallery__image-wrapper gallery__image-wrapper--higher-image">
                <img
                    class="gallery__image"
                    src="{{ asset('images/gallery/gallery2.png') }}"
                    alt="big-image"
                />
            </div>

            <div class="gallery__image-wrapper gallery__image-wrapper--small-image-top">
                <img
                    class="gallery__image"
                    src="{{ asset('images/gallery/gallery3.png') }}"
                    alt="big-image"
                />
            </div>

            <div class="gallery__image-wrapper gallery__image-wrapper--small-image-bottom">
                <img
                    class="gallery__image"
                    src="{{ asset('images/gallery/gallery4.png') }}"
                    alt="big-image"
                />
            </div>
        </div>
    </section>

    <section class="featured-products">
        <div class="container">
            <h2 class="section-heading">
                {{ __('New Products') }}
            </h2>

            <div class="featured-products__container">
                @foreach($products as $product)
                    <div class="featured-products__item">
                        <div class="featured-products__item-image-wrapper">
                            <img
                                class="featured-products__item-image"
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                            >
                        </div>

                       <div class="featured-products__content">
                           <p class="featured-products__item-title">
                               {{ $product->name }}
                           </p>

                           <p class="featured-products__item-description">
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Assumenda dignissimos doloremque ducimus ea fugiat, illo non quos?
                               Blanditiis debitis distinctio est mollitia nisi quas similique suscipit. Dolorem nemo porro sequi?
                           </p>

                           <a class="button button--action" href="collection/0/product/{{ $product->id }}">
                               {{ __('Show Watches') }}
                           </a>
                       </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

