@aware(['error', 'required'])
@props(['error' => null, 'required' => false])

<select
    x-bind:id="$id('input')"
    {{ $required ? 'required="required"' : '' }}
    {{ $attributes->class([
        'form-control',
        'is-invalid has-invalid-feedback' => $error
    ]) }}
>
    {{ $slot }}
</select>
