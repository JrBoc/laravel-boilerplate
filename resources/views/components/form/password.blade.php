@aware(['error', 'required'])
@props(['error' => null, 'required' => null])

<div
    {{ $attributes->class('input-group') }}
    x-data="{show: false}"
>
    <input
        x-bind:id="$id('input')"
        x-bind:type="show ? 'text' : 'password'"
        {{ $required ? 'required="required"' : '' }}
        {{ $attributes->class([
            'form-control',
            'is-invalid has-invalid-feedback' => $error
        ]) }}
    >
    <button
        x-on:click="show = !show"
        class="btn btn-outline-secondary"
        type="button"
        tabindex="-1"
    >
        <i class="far fa-fw " x-bind:class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
    </button>
</div>
