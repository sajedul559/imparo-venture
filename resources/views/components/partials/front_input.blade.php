<div class="form-group">
    <label for="#">{{ $label ?? 'Input label' }}</label>
    <input {{ $attributes->merge(['class' => 'form-control', 'type' => 'text', 'placeholder' => '']) }}>
    
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    @endif
</div>
