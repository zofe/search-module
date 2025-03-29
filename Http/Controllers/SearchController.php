<?php

namespace App\Modules\Search\Http\Controllers;

use App\Http\Controllers\Controller;


class SearchController extends Controller
{

    public $search;

    public function search()
    {
        $this->search = request()->query('q');

        $items = collect([]);
        if($this->search) {

            foreach(config('search.models') as $entity) {


                $class = $entity['class'];
                $scope = $entity['scope'];
                $limit = $entity['limit'];

                $its = (new $class)->$scope($this->search)->take($limit)->get()->map(function($r) use ($entity) {
                    $r->item_type = strtolower(class_basename($entity['class']));
                    $r->item_route = $entity['route'];
                    $r->item_view = $entity['view'];
                    return $r;
                });

                $items = $items->merge($its);

                $items = $items->map(function ($result) {
                    $item = new \stdClass();
                    $item->id = $result->id;
                    $item->url = route_lang($result->item_route, $result->id);
                    $item->html = view($result->item_view, ['item' => $result])->render();
                    return $item;
                });

            }
        }

        return response()->json($items);
    }

}
