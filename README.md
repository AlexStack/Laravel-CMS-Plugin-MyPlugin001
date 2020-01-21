# Semi-finished page-tab type EXAMPLE plugin

-   This is a semi-finished page-tab EXAMPLE plugin of Amila Laravel CMS
-   The main purpose of this example plugin is to guide you to make your own plugin easily
-   You can edit the blade template & Laravel controller to fit your own usage
-   Tutorial: https://www.laravelcms.tech/Laravel-Create-your-own-plugin.html

## Install it via the backend

-   Go to the CMS settings page -> Plugin -> search for myplugin001
-   Find alexstack/laravel-cms-plugin-myplugin001
-   Click the Install button

## What the plugin does for us?

-   An example of a page-tab plugin include blade and controller files

## Install it via command line manually

```php
composer require alexstack/laravel-cms-plugin-myplugin001

php artisan migrate --path=./vendor/alexstack/laravel-cms-plugin-myplugin001/src/database/migrations

php artisan vendor:publish --force --tag=myplugin001-views

php artisan laravelcms --action=clear

```

## How to use it?

-   It's enabled after installing by default. You can see a MyPlugin tab when you edit a page.

## Improve this plugin & documents

-   You are very welcome to improve this plugin and how to use documents

## License

-   This Amila Laravel CMS plugin is open-source software licensed under the MIT license.
