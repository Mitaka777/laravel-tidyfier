# [laravel-tidyfier](http://roumen.it/projects/laravel-tidyfier) package

[![Latest Stable Version](https://poser.pugx.org/roumen/tidyfier/version.png)](https://packagist.org/packages/roumen/tidyfier) [![Total Downloads](https://poser.pugx.org/roumen/tidyfier/d/total.png)](https://packagist.org/packages/roumen/tidyfier) [![Build Status](https://travis-ci.org/RoumenDamianoff/laravel-tidyfier.png?branch=master)](https://travis-ci.org/RoumenDamianoff/laravel-tidyfier) [![License](https://poser.pugx.org/roumen/tidyfier/license.png)](https://packagist.org/packages/roumen/tidyfier)

Tidyfier package for Laravel 5.

## Notes

Branch dev-master is for development and is unstable

## Installation

Run the following command and provide the latest stable version (e.g v1.1.2) :

```bash
composer require roumen/tidyfier
```

or add the following to your `composer.json` file :

```json
"roumen/tidyfier": "1.1.*"
```

Then register this service provider with Laravel :

```php
'Roumen\Tidyfier\TidyfierServiceProvider',
```

and add class alias for easy usage
```php
'Tidyfier' => 'Roumen\Tidyfier\Tidyfier',
```

Don't forget to use ``composer update`` and ``composer dump-autoload`` when is needed!

## Examples

[Example usage and tutorials](https://github.com/RoumenDamianoff/laravel-tidyfier/wiki)
