<div class="d-flex container-fluid">


    <form class="my-3 w-50" autocomplete="off">
        <div class="input-group">
            <x-rpd::input
                model="search"
                aria-haspopup="true"
                aria-label="Search"
                aria-describedby="basic-addon1"
                tabindex="1"
                id="searchDropdown"
                class="form-control"
                autocomplete="off"
                placeholder="search.."
            />
{{--            <input--}}
{{--                id="globalsearch"--}}
{{--                type="text"--}}
{{--                   wire:model="globalsearch"--}}


{{--                   aria-haspopup="true"--}}
{{--                   aria-label="Search"--}}
{{--                   aria-describedby="basic-addon1"--}}
{{--                   tabindex="1"--}}
{{--                   id="searchDropdown"--}}
{{--                   wire:model="globalsearch"--}}
{{--                   class="form-control"--}}
{{--                   type="text"--}}
{{--                   autocomplete="off"--}}
{{--                   placeholder="search.."--}}


{{--            >--}}
            <span class="input-group-text rounded-0 rounded-end" id="basic-addon1"><i class="fas fa-search fa-sm"></i></span>
            @if($search)
                    <button type="button" class="btn btn-light btn-xsm text-gray-600" wire:click="emptySearch">
                        <i class="fa fa-times"></i>
                    </button>
            @endif


        </div>

    </form>

    @if($items->count())

        <div  class="dropdown-list dropdown-menu dropdown-menu-right shadow show" aria-labelledby="searchDropdown" style="margin-top:-0.6em">

            @forelse($items as $item)

                @include($item->item_view)

            @empty
                <div class="dropdown-item p-3">
                    nessun elemento trovato
                </div>
            @endforelse
        </div>
    @endif
</div>
