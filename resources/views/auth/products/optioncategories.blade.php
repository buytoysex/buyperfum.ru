@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id }}"
            @isset($product)
                @if($product->category_id == $categoryItem->id)
                selected
                @endif
            @endisset
            @isset($category->id)
                @if($category->parent_id == $categoryItem->id)
                    selected
                @endif
            @endisset
    >{{ $delimeter ?? '' }} {{ $categoryItem->name }}
    </option>
    @isset($categoryItem->children)
        @include('auth.products.optioncategories', [
            'categories' => $categoryItem->children,
            'delimeter' => ' — ' . $delimeter
        ])
    @endisset
@endforeach
