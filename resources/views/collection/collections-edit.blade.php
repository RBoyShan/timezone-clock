@extends('layout')

@section('app-title', 'Edit Collection')

@section('page-title', 'Edit Collection')

@section('page-content')
    <div class="container">
        <form class="form create-form" method="post" action="/collections/{{ $collection->id }}">

            @csrf

            {{ method_field('patch') }}

            <div class="create-form__group">
                @include('includes.input.default-input-text', [
                    'field'       => 'name',
                    'label'       => 'Collection name:',
                    'placeholder' => 'Collection name',
                    'value'       => $collection->name
                ])
            </div>

            <div class="create-form__group">
                @include('includes.input.default-input-textbox', [
                   'field'       => 'description',
                   'label'       => 'Collection description:',
                   'placeholder' => 'Collection description',
                   'value'       => $collection->description
               ])
            </div>

            <div class="create-form__group">
                @include('includes.input.default-input-text', [
                   'field'       => 'image_src',
                   'label'       => 'Collection image:',
                   'placeholder' => 'Collection image URL',
                   'value'       => $collection->image_src
               ])
            </div>

            <div class="create-form__group">
                <label class="label create-form__label" for="product_id">
                    Product:
                </label>

                <select class="input create-form__control select {{ $errors->has('product_id') ? 'input--error' : '' }}"
                        name="product_id"
                        id="product_id"
                >
                    @foreach($products as $product)
                        <option @if($collection->product_id == $product->id) selected @endif value="{{ $product->id }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>

                @include('includes.errors.validation-error', ['errorTarget' => 'product_id'])
            </div>

            <button class="button button--submit create-form__submit" type="submit">Edit</button>

            <button class="button button--delete create-form__delete"
                    type="button"
                    data-toggle="modal"
                    data-target="#deleteModal"
            >
                Remove
            </button>
        </form>

        <div class="modal fade"
             id="deleteModal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="ModalLabel"
             aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">
                            <span>Confirm collection removal</span>
                        </h5>

                        <button class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true">✕</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Delete collection {{ $collection->name }}
                    </div>

                    <div class="modal-footer">
                        <button class="button button--cancel"
                                type="button"
                                data-dismiss="modal"
                        >
                            <span>No</span>
                        </button>

                        <button class="button button--delete js-remove-collection" type="button">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.js-remove-collection').click(function () {
                let id = {!! $collection->id !!} ;

                $.ajax({
                    url: `/collections/${id}`,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token: '{!! csrf_token() !!}'
                    },

                    success: function (message) {
                        location.href = '/collections';
                    }
                });
            });
        });
    </script>
@endsection
