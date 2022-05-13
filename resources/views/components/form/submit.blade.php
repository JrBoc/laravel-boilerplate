<button
    {{ $attributes->class('btn') }}
    type="submit"
    x-data="isClicked = false"
    x-on:click="isClicked = true"
    x-bind:disabled="isClicked ? 'true' : 'false'"
>
    {{ $slot }}
</button>
