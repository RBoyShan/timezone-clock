@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Edit product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="/product/{{ $product->id }}">

          @csrf

           {{ method_field('patch') }}

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-name">
                   Product name:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="name"
                      id="prod-name"
                      placeholder="Product name"
                      value="{{ $product->name }}"
               />
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-manufacturer">
                   Product manufacturer:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="manufacturer"
                      id="prod-manufacturer"
                      placeholder="Product manufacturer"
                      value="{{ $product->manufacturer }}"
               />
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-image">
                   Product image:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="image"
                      id="prod-image"
                      placeholder="Product image URL"
                      value="{{ $product->image }}"
               />
           </div>

           <div class="create-form__group create-form__group--double">
               <div class="create-form__group create-form__group--half">
                   <label class="label create-form__label" for="prod-price">
                       Product price:
                   </label>

                   <input class="input create-form__control"
                          type="number"
                          min="0.00"
                          max="10000.00"
                          step="0.01"
                          name="prod-price"
                          id="prod-price"
                          placeholder="Product manufacturer"
                          value="{{ $product->price }}"
                   />
               </div>

               <div class="create-form__group create-form__group--half">
                   <label class="label create-form__label" for="prod-count">
                       Product count:
                   </label>

                   <input class="input create-form__control"
                          type="number"
                          min="1"
                          max="10000"
                          name="count"
                          id="prod-count"
                          placeholder="Product count"
                          value="{{ $product->count }}"
                   />
               </div>
           </div>

           <button class="button button--submit create-form__submit"
                   type="submit"
           >
               Edit
           </button>

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
                           <p>Confirm product removal</p>
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

                       <button class="button button--delete js-remove-product"
                               type="button"
                       >
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
                      location.href = '/products';
                  }
              });
          });
       });
   </script>
@endsection
