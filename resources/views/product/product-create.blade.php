@extends('layout')

@section('app-title', 'Product list')

@section('page-title', 'Create product')

@section('page-content')
   <div class="container">
       <form class="form create-form" method="post" action="{{ url('product') }}">

           {{ csrf_field() }}

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'prod-name',
                   'label'       => 'Product name:',
                   'placeholder' => 'Product name',
                   'value'       => old('prod-name')
               ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                   'field'       => 'prod-manufacturer',
                   'label'       => 'Product manufacturer:',
                   'placeholder' => 'Product manufacturer',
                   'value'       => old('prod-manufacturer')
               ])
           </div>

           <div class="create-form__group">
               @include('includes/default-input-text', [
                  'field'       => 'prod-image',
                  'label'       => 'Product image:',
                  'placeholder' => 'Product image URL',
                  'value'       => old('prod-image')
              ])
           </div>

           <div class="create-form__group create-form__group--double">
               <div class="create-form__group create-form__group--half">
                   @include('includes/default-input-number', [
                        'field'       => 'prod-price',
                        'label'       => 'Product price:',
                        'placeholder' => 'Product price',
                        'min'         => '0.00',
                        'max'         => '10000.00',
                        'step'        => '0.01',
                        'value'       => old('prod-price')
                    ])
               </div>

               <div class="create-form__group create-form__group--half">
                   @include('includes/default-input-number', [
                       'field'       => 'prod-count',
                       'label'       => 'Product count:',
                       'placeholder' => 'Product count',
                       'min'         => '1',
                       'max'         => '10000',
                       'step'        => '1',
                       'value'       => old('prod-count')
                   ])
               </div>
           </div>

           <button class="button button--submit create-form__submit" type="submit">Add</button>
       </form>
   </div>
@endsection
