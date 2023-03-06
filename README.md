# Search Module

This is a demo module for a Laravel application (>= 8) 

Search module is designed to centralize the logic of a "global search" in the project. 

# Installation & configuration 


by default it search in a list of models you can define in the config file,
for each model you need to specify:

* the class
* the query scope
* the route (to link at result detail)
* the query limit
* the view (of the result item, to customize item appareance)


```php
    'models' => [
        [
            'class' => \App\Models\User::class,
            'scope' => 'ssearch',
            'route' => 'auth.users.view',
            'limit' => 5,
            'view'  => 'search::item',
        ],
    ]
```

Your laravel application must have rapyd-livewire package already installed first, then you can require this module using: 

Note that search module use layout-module, you may need to do:

```
cd app/Modules/Layout/

npm i
npm run dev
```

this will compile scss and copy css assets to your public project folder


# Usage
This command will create a folder "Search" in your /app/Modules/ folder.

this component: 
`/app/Modules/Search/Components/SearchNavbar.php`

has the logic of "global search" in the project.
searches the users, and potentially the main models of all other installed modules.
