<ul>
    @foreach($categories as $categoryItem)
        {{--        {{ dd($parentcategory->id . ' ' .$categoryItem->id) }}--}}
        <li @if(request()->path() == 'category/'.$categoryItem->code) class="active" @endif>
            <a href="{{ route('subcategory', $categoryItem->code) }}">
                {{ $delimeter ?? '' }}{{ $categoryItem->name }} {{--{{ $categoryItem->children->count() }}--}}
            </a>
        </li>
        @if($categoryItem->children->count() !== 0)
            @include('layouts.menucategories', [
                    'categories' => $categoryItem->children,
                    'delimeter' => ' - ' . $delimeter
                ])
        @endif
    @endforeach
</ul>
