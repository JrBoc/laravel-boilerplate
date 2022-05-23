@aware(['error'])
@props(['error' => null])

@if($error)
    <div class="d-block invalid-feedback">
        {{ $error }}
    </div>
@endif
