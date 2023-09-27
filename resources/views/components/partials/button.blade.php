<button {{ $attributes->merge(['class' => 'btn w-md waves-effect waves-light', 'type' => 'button']) }}>
    {{ $slot }}
</button>
