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
        $items = collect([]);
        if($this->search) {

            foreach(config('search.models') as $entity) {

                $class = $entity['class'];
                $scope = $entity['scope'];
                $limit = $entity['limit'];

                $its = (new $class)->$scope($this->search, $limit)->get()->map(function($r) use ($entity) {
                    $r->item_type = strtolower(class_basename($entity['class']));
                    $r->item_route = $entity['route'];
                    $r->item_view = $entity['view'];
                    return $r;
                });

                $items = $items->merge($its);
               // dd($items);
            }
        }

        return $items;
    }

    public function emptySearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $items = $this->getDataset();

        return view('search::views.search_navbar', [
            'items' => $items,
        ]);
    }

}
