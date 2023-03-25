# Search Module

This is a demo module for a Laravel application (>= 8) 

Search module is designed to centralize the logic of a "global search" in the project. 

# Installation & configuration 


By default, this "field" search in a list of models you can define in the config file,
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

# Layout 

Note that this module will install/use layout-module, you may need to do:

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

# Customizing Module
To customize the module code, we recommend forking the original package repository on GitHub and making changes there. This way, you can maintain a separate branch for your changes, while also keeping up-to-date with the latest releases of the package.

To install your forked version of the package in your Laravel application, you can reference your forked repository in the composer.json file of your Laravel application using the "vcs" package type. Here's an example of what you can add to your composer.json:

```json

"repositories": [
{
"type": "vcs",
"url": "https://github.com/<your-github-username>/<package-name>"
}
],
```
Replace `<your-github-username>` with your GitHub username and `<package-name>` with the name of your forked package repository.

After adding your forked repository to composer.json, you can require your customized package in the same way you would require the original package:

```php
composer require <your-github-username>/<package-name>:dev-<your-branch-name>
```
Replace `<your-github-username>`, `<package-name>`, and `<your-branch-name>` with the appropriate values for your forked repository and branch.

By using this approach, you can easily customize the module code while also keeping your code up-to-date with the latest releases of the package.

We encourage developers to make changes that could be useful to the wider community and contribute back to the original package repository via pull requests. This can help improve the package for everyone and ensure that your changes are integrated with the latest releases of the package.
