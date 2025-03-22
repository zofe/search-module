<?php
namespace App\Modules\Search\Traits;


use Illuminate\Support\Facades\App;
use Meilisearch\Endpoints\Indexes;
use Laravel\Scout\Searchable;

trait SSearch
{
    use Searchable;

    /**
     * Metodo principale per la ricerca fulltext.
     *
     * @param string $search
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function ssearch($search, $limit = null)
    {
        if (empty($search)) {
            return static::query();
        }

        // Se siamo in testing o il motore di ricerca non è abilitato
        if (App::environment('testing') || ! static::shouldUseSearchEngine()) {
            return static::ssearchFallback($search);
        }

        // Esecuzione della ricerca tramite il motore (ad es. Scout/Meilisearch)
        $matching = static::search($search, function (Indexes $engine, $query, $searchParams) use ($limit) {
            // Unione dei parametri di default con quelli definiti nel modello
            $params = array_merge(static::defaultSearchParams(), static::getSearchOptions());
            if ($limit) {
                $params['limit'] = $limit;
            }
            return $engine->search($query, $params);
        });

        $matchingIds = $matching->get()->pluck('id');

        if ($matchingIds->isNotEmpty()) {
            return static::query()->whereIn('id', $matchingIds);
        }

        // Se nessun risultato, utilizzo il fallback
        return static::ssearchFallback($search);
    }

    /**
     * Fallback per la ricerca, ad esempio una query "like" sui campi predefiniti.
     *
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function ssearchFallback($search)
    {
        $query = static::query();
        $columns = static::getFallbackColumns();

        if (empty($columns)) {
            return $query;
        }

        // Costruisce una query "orWhere" su ogni colonna definita
        foreach ($columns as $column) {
            $query->orWhere($column, 'like', '%' . $search . '%');
        }
        return $query;
    }

    /**
     * Determina se utilizzare il motore di ricerca fulltext.
     *
     * @return bool
     */
    protected static function shouldUseSearchEngine()
    {
        return config('features.use_meilisearch', false);
    }

    /**
     * Parametri di default per la ricerca fulltext.
     *
     * @return array
     */
    protected static function defaultSearchParams()
    {
        return [
            'limit' => 10,
            'attributesToRetrieve' => ['id']
        ];
    }

    /**
     * Opzioni aggiuntive per la ricerca, da sovrascrivere nel modello se necessario.
     *
     * @return array
     */
    protected static function getSearchOptions()
    {
        return property_exists(static::class, 'searchOptions') ? static::$searchOptions : [];
    }

    /**
     * Restituisce i campi su cui eseguire il fallback.
     *
     * @return array
     */
    protected static function getFallbackColumns()
    {
        return property_exists(static::class, 'searchableColumns') ? static::$searchableColumns : [];
    }
}
