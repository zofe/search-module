<a tabindex="{{$loop->iteration}}" class="search-result dropdown-item d-flex align-items-center py-1" href="{{ route($item->item_route, $item->id) }}">
    <div>
        <span class="">{{ $item->name }}</span>
    </div>
</a>
