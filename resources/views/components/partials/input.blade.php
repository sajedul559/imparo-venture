@props([
    'title' => '',
])

<div class="form-group">
    <label for="username">{{ $title ?? 'Input title' }}</label>
    <div>
        <input {{ $attributes->merge(['class' => 'form-control', 'type' => 'text', 'placeholder' => '']) }}>

        {{ $slot ?? '' }}
    </div>
</div>
