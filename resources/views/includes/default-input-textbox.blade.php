<label class="label create-form__label" for="{{ $field }}">
    {{ $label }}
</label>

<textarea class="input textarea create-form__control {{ $errors->has($field) ? 'input--error' : '' }}"
          name="{{ $field }}"
          id="{{ $field }}"
          placeholder="{{ $placeholder }}"
>{{ $value }}</textarea>

@include('includes/validation-error', ['errorTarget' => $field])
