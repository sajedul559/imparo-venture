<label for="" class="m-0" id="englishValue">
    @if (!is_null($items) )

    <select name="page_name" id="page-name" class="text form-select text-dark form-control w-100" style="width: 260px">
        <option value="">select template</option>
        @foreach ($items as $value)
        <option value="{{ $value->name }}">
            {{ $value->name }} <span></span></option>
        @endforeach
    </select>
    @endif
</label>
