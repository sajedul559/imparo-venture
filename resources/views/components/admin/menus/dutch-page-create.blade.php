
 <label for="" class="m-0">
    @if (!is_null($serCategoris) )
        <select name="category_name" id="category-name"
            class="text form-select text-dark form-control w-100"
            style="width: 260px">
            @foreach ($serCategoris as $vala)
                <option value="{{ $vala->name }}">
                    {{ $vala->name }} {{ $vala->language == "english" ? "(en)" : "(nl)" }}</option>
            @endforeach
        </select>
    @endif
</label>
