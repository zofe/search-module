<?php

namespace App\Modules\Search\Components;


//use App\Models\Company;
//use App\Traits\Authorize;
use Livewire\Component;


/**
 * @codeCoverageIgnore
 */
class SearchNavbar extends Component
{
    //use Authorize;

    public $search = '';

    protected $listeners = [
    ];

    protected function getDataset()
    {
        if($this->search) {
            $items = collect([]);
//            $companies = Company::ssearch($this->search, 5)->limit(5)->get()->map(function($r) {
//                $r['item_type'] = 'company'; return $r;
//            });
//
//            $items = $companies->merge(collect([]))->take(15);
        } else {
            $items = collect([]);
        }
        return $items;
    }

    public function emptySearch()
    {
        $this->search = '';
    }

    public function render()
    {
        //dd(auth()->user()->getRoleNames()->toArray(), auth()->user());


        $items = $this->getDataset();

        return view('search::views.search_navbar', [
            'items' => $items,
        ]);
    }

}
