<label class="label create-form__label" for="{{ $field }}">
    {{ $label }}
</label>

<input class="input create-form__control {{ $errors->has($field) ? 'input--error' : '' }}"
       type="text"
       name="{{ $field }}"
       id="{{ $field }}"
       placeholder="{{ $placeholder }}"
       value="{{ $value }}"
/>

@include('includes/validation-error', ['errorTarget' => $field])
