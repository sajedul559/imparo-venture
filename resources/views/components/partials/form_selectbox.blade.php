
<div class="form-group">
    <label for="{{ $name }}" class="{{ $required ?? '' }} form-label">{{ $labelName }}</label><br>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control shadow-none form-select{{ $class ?? '' }}">
    {{ $slot }}
    </select>
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    @endif
</div>
