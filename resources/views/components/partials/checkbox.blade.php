@props(['title'])

<div class="custom-control custom-checkbox">
    <input {{ $attributes->merge(['class' => 'custom-control-input', 'type' => 'checkbox']) }}>
    <label class="custom-control-label" for="customControlInline">{{ $title ?? 'Input title' }}</label>
</div>
