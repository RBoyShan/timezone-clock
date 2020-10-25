<div class="container">
    <div class="form create-form">
        <div class="create-form__group">
            <select class="input create-form__control select js-product-collections-filter"
                    name="prod-collections-filter"
            >
                <option value="0">All Products</option>

                @foreach($collections as $collection)
                    <option value="{{ $collection->id }}"
                        @if($collection->id == $collection_filter_id)
                            selected
                        @endif
                    >
                        {{ $collection->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<script defer="defer">
    $('.js-product-collections-filter')
        .change(function (e) {
            let id  = this.value;
            let url = '/product';

            url = '/collection/' + id + url;

            location.href = url;
        });
</script>
