@if ($errors->any())

    <ul class="parsley-errors-list filled">
        @foreach ($errors->all() as $error)
            <li class="parsley-required">{{ $error }}</li>
        @endforeach
    </ul>
@endif
