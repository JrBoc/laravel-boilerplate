@props(['label' => null, 'error' => null, 'required' => false])

<div
    x-data
    x-id="['input']"
    {{ $attributes->class('form-group') }}
>
    @if($label)
        <label x-bind:for="$id('input')">
            {{ $label }}: {!! $required ? '<strong class="text-danger">*</strong>' : '' !!}
        </label>
    @endif
    {{ $slot }}
    @if($error)
        <div class="d-block invalid-feedback">
            {{ $error }}
        </div>
    @endif
</div>
