@props([
    'type' => '',
    'message' => 'This field is required'
])
@php
    $class = "";
@endphp
@if($type)

@switch($type)
    @case('error')
        @php
            $class = "parsley-errors-list filled";
        @endphp
        @break
    @default
    @php
        $class = "parsley-errors-list filled";
    @endphp
@endswitch

    <ul class="parsley-errors-list filled"  {{ $attributes->merge(['class' => $class]) }}>
        <li class="parsley-required">{{ $message }}</li>
    </ul>
@endif
