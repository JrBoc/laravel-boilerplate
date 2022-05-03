@aware(['error', 'required'])
@props(['error' => null, 'required' => false])

<input
    x-bind:id="$id('input')"
    type="email"
    {{ $required ? 'required="required"' : '' }}
    {{ $attributes->class([
        'form-control',
        'is-invalid has-invalid-feedback' => $error
    ]) }}
>
