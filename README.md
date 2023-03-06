# Search Module

This is a demo module for a Laravel application (>= 8) 

Search module is designed to centralize the logic of a "global search" in the project. it searches the users, and potentially the main models of all other installed modules.

# Installation & configuration 

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
