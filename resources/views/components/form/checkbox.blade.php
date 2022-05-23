@props(['name' => null, 'error' => null, 'required' => false, 'checked' => false, 'value' => null, 'disabled' => false])
<div
    x-data
    x-id="['input']"
    {{ $attributes->class([
        'form-check'
    ]) }}
>
    <input
        name="{{ $name ?? '' }}"
        class="form-check-input"
        type="checkbox"
        x-bind:id="$id('input')"
        value="{{ $value ?? 'on' }}"
        {{ $required ? 'required="required"' : '' }}
        {{ $checked ? 'checked="checked"' : '' }}
        @if($disabled)
            disabled="disabled" style="opacity: 1"
        @endif
    >
    @if($slot)
        <label
            class="form-check-label"
            x-bind:for="$id('input')"
            @if($disabled)
                style="opacity: 1"
            @endif
        >
            {{ $slot }}
        </label>
    @endif
    @if($error)
        <div class="d-block invalid-feedback">
            {{ $error }}
        </div>
    @endif
</div>
