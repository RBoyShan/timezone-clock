@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Create product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="collection/{{ $collection_filter_id }}/product">

           {{ csrf_field() }}

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'name',
                   'label'       => 'Product name:',
                   'placeholder' => 'Product name',
                   'value'       => old('name')
               ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'manufacturer',
                   'label'       => 'Product manufacturer:',
                   'placeholder' => 'Product manufacturer',
                   'value'       => old('manufacturer')
               ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                  'field'       => 'image',
                  'label'       => 'Product image:',
                  'placeholder' => 'Product image URL',
                  'value'       => old('image')
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
                        'value'       => old('price')
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
                       'value'       => old('count')
                   ])
               </div>
           </div>

           <div class="create-form__group">
               <label class="label create-form__label" for="collection">
                   Product:
               </label>

               <select class="input create-form__control select {{ $errors->has('collection') ? 'input--error' : '' }}"
                       name="collection"
                       id="collection"
               >
                   <option selected disabled value="0">Select Collection</option>

                   @foreach($collections as $collection)
                       <option  value="{{ $collection->id }}">
                           {{ $collection->name }}
                       </option>
                   @endforeach
               </select>

               @include('includes/validation-error', ['errorTarget' => 'collection'])
           </div>

           <button class="button button--submit create-form__submit" type="submit">Add</button>
       </form>
   </div>
@endsection
