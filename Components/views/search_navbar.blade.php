<li class="nav-item dropdown no-arrow mx-1">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 mb-2  mw-100 navbar-search mt-3" autocomplete="off">
        <div class="input-group">

            <input aria-haspopup="true"
                   tabindex="1"
                   id="searchDropdown"
                   wire:model.debounce.250ms="search"
                   class="form-control bg-light border-0 small"
                   type="text"
                   autocomplete="off"
                   placeholder="cerca...">

            @if($search)
                <button type="button" class="btn btn-light btn-xsm text-gray-600" wire:click="emptySearch">
                    <i class="fa fa-times"></i>
                </button>
            @endif
            <span class="input-group-text"><i class="fas fa-search fa-sm"></i></span>

        </div>

    </form>

    @if($items->count())

        <div  class="dropdown-list dropdown-menu dropdown-menu-right shadow show" aria-labelledby="searchDropdown" style="margin-top:-0.6em">

            @forelse($items as $item)
                @if($item->item_type =='company')

                    <a tabindex="{{$loop->iteration}}" class="search-result dropdown-item d-flex align-items-center py-1" href="{{ route('companies.companies.view',$item->id) }}">
                        <div>
                            <span class="">{!! $item->badge !!} {{ $item->business_name }} </span>
                        </div>
                    </a>
                @endif

            @empty
                <div class="dropdown-item p-3">
                    nessun elemento trovato
                </div>
            @endforelse
        </div>
    @endif
</li>
