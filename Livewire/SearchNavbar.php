<?php

namespace App\Modules\Search\Livewire;



use App\Models\User;
use Livewire\Component;


/**
 * @codeCoverageIgnore
 */
class SearchNavbar extends Component
{
    //use Authorize;

    public $search = '';
    public $items = [];

    protected $listeners = [
    ];

    public function booted()
    {
    }

    public function emptySearch()
    {
        $this->search = '';
    }

    public function render()
    {
        return view('search::search_navbar', [
            'items' => $this->items,
        ]);
    }

}
