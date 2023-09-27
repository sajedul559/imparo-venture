<div class="form-group">
    <label for="#">{{ $label ?? 'Input label' }}</label>
    <select {{ $attributes->merge(['class' => 'form-control form-select', 'placeholder' => '']) }}>
        <option value="customer">Customer</option>

      </select>
</div>

