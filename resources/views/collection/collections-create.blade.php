@extends('layout')

@section('app-title', 'Create Collection')

@section('page-title', 'Create Collection')

@section('page-content')
    <div class="container">
        <form class="form create-form" method="post" action="{{ url('collections') }}">

            {{ csrf_field() }}

            <div class="create-form__group">
                @include('includes/default-input-text', [
                    'field'       => 'name',
                    'label'       => 'Collection name:',
                    'placeholder' => 'Collection name',
                    'value'       => old('name')
                ])
            </div>

            <div class="create-form__group">
                @include('includes/default-input-textbox', [
                   'field'       => 'description',
                   'label'       => 'Collection description:',
                   'placeholder' => 'Collection description',
                   'value'       => old('description')
               ])
            </div>

            <div class="create-form__group">
                @include('includes/default-input-text', [
                   'field'       => 'image_src',
                   'label'       => 'Collection image:',
                   'placeholder' => 'Collection image URL',
                   'value'       => old('image_src')
               ])
            </div>

            <div class="create-form__group">
                <label class="label create-form__label" for="product_id">
                    Product:
                </label>

                <select class="input create-form__control select {{ $errors->has('product_id') ? 'input--error' : '' }}"
                        name="product_id"
                >
                    <option selected disabled value="0">Select Product</option>

                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                @include('includes/validation-error', ['errorTarget' => 'product_id'])
            </div>

            <button class="button button--submit create-form__submit" type="submit">Add</button>
        </form>
    </div>
@endsection
