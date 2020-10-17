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

               <input class="input create-form__control {{ $errors->has('name') ? 'input--error' : '' }}"
                      type="text"
                      name="name"
                      id="prod-name"
                      placeholder="Product name"
                      value="{{ $product->name }}"
                      required
                      maxlength="100"
               />

               @if($errors->has('name'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('name') as $error)
                               <li>
                                   {{ $error }}
                               </li>
                           @endforeach
                       </ul>
                   </small>
               @endif
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-manufacturer">
                   Product manufacturer:
               </label>

               <input class="input create-form__control {{ $errors->has('manufacturer') ? 'input--error' : '' }}"
                      type="text"
                      name="manufacturer"
                      id="prod-manufacturer"
                      placeholder="Product manufacturer"
                      value="{{ $product->manufacturer }}"
                      required
                      maxlength="100"
               />

               @if($errors->has('manufacturer'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('manufacturer') as $error)
                               <li>
                                   {{ $error }}
                               </li>
                           @endforeach
                       </ul>
                   </small>
               @endif
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-image">
                   Product image:
               </label>

               <input class="input create-form__control {{ $errors->has('image') ? 'input--error' : '' }}"
                      type="text"
                      name="image"
                      id="prod-image"
                      placeholder="Product image URL"
                      value="{{ $product->image }}"
                      required
               />

               @if($errors->has('image'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('image') as $error)
                               <li>
                                   {{ $error }}
                               </li>
                           @endforeach
                       </ul>
                   </small>
               @endif
           </div>

           <div class="create-form__group create-form__group--double">
               <div class="create-form__group create-form__group--half">
                   <label class="label create-form__label" for="prod-price">
                       Product price:
                   </label>

                   <input class="input create-form__control {{ $errors->has('price') ? 'input--error' : '' }}"
                          type="number"
                          min="0.00"
                          max="100000.00"
                          step="0.01"
                          name="price"
                          id="prod-price"
                          placeholder="Product manufacturer"
                          value="{{ $product->price }}"
                          required
                   />

                   @if($errors->has('price'))
                       <small class="form-text text-danger error-message">
                           <ul>
                               @foreach($errors->get('price') as $error)
                                   <li>
                                       {{ $error }}
                                   </li>
                               @endforeach
                           </ul>
                       </small>
                   @endif
               </div>

               <div class="create-form__group create-form__group--half">
                   <label class="label create-form__label" for="prod-count">
                       Product count:
                   </label>

                   <input class="input create-form__control {{ $errors->has('count') ? 'input--error' : '' }}"
                          type="number"
                          min="1"
                          max="99"
                          name="count"
                          id="prod-count"
                          placeholder="Product count"
                          value="{{ $product->count }}"
                          required
                   />

                   @if($errors->has('count'))
                       <small class="form-text text-danger error-message">
                           <ul>
                               @foreach($errors->get('count') as $error)
                                   <li>
                                       {{ $error }}
                                   </li>
                               @endforeach
                           </ul>
                       </small>
                   @endif
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
                      location.href = '/product';
                  }
              });
          });
       });
   </script>
@endsection
