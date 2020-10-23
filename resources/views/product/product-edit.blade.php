@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Edit product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="/product/{{ $product->id }}">

          @csrf

           {{ method_field('patch') }}

           <div class="create-form__group">
               @include('includes/default-input-text', [
                  'field'       => 'name',
                  'label'       => 'Product name:',
                  'placeholder' => 'Product name',
                  'value'       => $product->name
              ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'manufacturer',
                   'label'       => 'Product manufacturer:',
                   'placeholder' => 'Product manufacturer',
                   'value'       => $product->manufacturer
               ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'image',
                   'label'       => 'Product image:',
                   'placeholder' => 'Product image',
                   'value'       => $product->image
               ])
           </div>

           <div class="create-form__group create-form__group--double">
               <div class="create-form__group create-form__group--half">
                   @include('includes/default-input-number', [
                        'field'       => 'price',
                        'label'       => 'Product price:',
                        'placeholder' => 'Product price',
                        'min'         => '0.00',
                        'max'         => '10000.00',
                        'step'        => '0.01',
                        'value'       => $product->price
                    ])
               </div>

               <div class="create-form__group create-form__group--half">
                   @include('includes/default-input-number', [
                        'field'       => 'count',
                        'label'       => 'Product count:',
                        'placeholder' => 'Product count',
                        'min'         => '1',
                        'max'         => '10000',
                        'step'        => '1',
                        'value'       => $product->count
                    ])
               </div>
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
                           <span>Confirm product removal</span>
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
                       Delete product {{ $product->name }}
                   </div>

                   <div class="modal-footer">
                       <button class="button button--cancel"
                               type="button"
                               data-dismiss="modal"
                       >
                            <span>No</span>
                       </button>

                       <button class="button button--delete js-remove-product" type="button">
                           <span>Delete</span>
                       </button>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <script>
       $(document).ready(function () {
          $('.js-remove-product').click(function () {
              let id = {!! $product->id !!} ;

              $.ajax({
                  url: `/product/${id}`,
                  type: 'post',
                  data: {
                      _method: 'delete',
                      _token: '{!! csrf_token() !!}'
                  },

                  success: function (message) {
                      location.href = '/product';
                  }
              });
          });
       });
   </script>
@endsection
