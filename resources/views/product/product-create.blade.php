@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Create product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="{{ url('product-list') }}">

           {{ csrf_field() }}

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-name">
                   Product name:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="prod-name"
                      id="prod-name"
                      placeholder="Product name"
               />
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-manufacturer">
                   Product manufacturer:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="prod-manufacturer"
                      id="prod-manufacturer"
                      placeholder="Product manufacturer"
               />
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-image">
                   Product image:
               </label>

               <input class="input create-form__control"
                      type="text"
                      name="prod-image"
                      id="prod-price"
                      placeholder="Product image URL"
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
                          name="prod-count"
                          id="prod-count"
                          placeholder="Product count"
                   />
               </div>
           </div>

           <button class="button button--submit create-form__submit"
                   type="submit"
           >
               Add
           </button>
       </form>
   </div>
@endsection
