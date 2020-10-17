@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Create product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="{{ url('product') }}">

           {{ csrf_field() }}

           <div class="create-form__group">
               <label class="label create-form__label" for="prod-name">
                   Product name:
               </label>

               <input class="input create-form__control {{ $errors->has('prod-name') ? 'input--error' : '' }}"
                      type="text"
                      name="prod-name"
                      id="prod-name"
                      placeholder="Product name"
                      value="{{ old('prod-name') }}"
               />

               @if($errors->has('prod-name'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('prod-name') as $error)
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

               <input class="input create-form__control {{ $errors->has('prod-manufacturer') ? 'input--error' : '' }}"
                      type="text"
                      name="prod-manufacturer"
                      id="prod-manufacturer"
                      placeholder="Product manufacturer"
                      value="{{ old('prod-manufacturer') }}"
               />

               @if($errors->has('prod-manufacturer'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('prod-manufacturer') as $error)
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

               <input class="input create-form__control {{ $errors->has('prod-image') ? 'input--error' : '' }}"
                      type="text"
                      name="prod-image"
                      id="prod-image"
                      placeholder="Product image URL"
                      value="{{ old('prod-image') }}"
               />

               @if($errors->has('prod-image'))
                   <small class="form-text text-danger error-message">
                       <ul>
                           @foreach($errors->get('prod-image') as $error)
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

                   <input class="input create-form__control {{ $errors->has('prod-price') ? 'input--error' : '' }}"
                          type="number"
                          min="0.00"
                          max="10000.00"
                          step="0.01"
                          name="prod-price"
                          id="prod-price"
                          placeholder="Product manufacturer"
                          value="{{ old('prod-price') }}"
                   />

                   @if($errors->has('prod-price'))
                       <small class="form-text text-danger error-message">
                           <ul>
                               @foreach($errors->get('prod-price') as $error)
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

                   <input class="input create-form__control {{ $errors->has('prod-count') ? 'input--error' : '' }}"
                          type="number"
                          min="1"
                          max="10000"
                          name="prod-count"
                          id="prod-count"
                          placeholder="Product count"
                          value="{{ old('prod-count') }}"
                   />

                   @if($errors->has('prod-count'))
                       <small class="form-text text-danger error-message">
                           <ul>
                               @foreach($errors->get('prod-count') as $error)
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
               Add
           </button>
       </form>
   </div>
@endsection
