@props(['name' => null, 'error' => null, 'required' => false, 'old' => false])
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
        {{ $required ? 'required="required"' : '' }}
        {{ isset($name) && $old === true && old($name) ? 'checked="checked"' : '' }}
    >
    @if($slot)
        <label class="form-check-label" x-bind:for="$id('input')">
            {{ $slot }}
        </label>
    @endif
    @if($error)
        <div class="d-block invalid-feedback">
            {{ $error }}
        </div>
    @endif
</div>
