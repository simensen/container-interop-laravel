Laravel adapter for Container Interop
=====================================

A [Container Interop](https://github.com/container-interop/container-interop) adapter for Laravel's [Container](http://laravel.com/docs/master/container).

[![Latest Stable Version](https://poser.pugx.org/monii/container-interop-laravel/v/stable)](https://packagist.org/packages/monii/container-interop-laravel)
[![Total Downloads](https://poser.pugx.org/monii/container-interop-laravel/downloads)](https://packagist.org/packages/monii/container-interop-laravel)
[![Latest Unstable Version](https://poser.pugx.org/monii/container-interop-laravel/v/unstable)](https://packagist.org/packages/monii/container-interop-laravel)
[![License](https://poser.pugx.org/monii/container-interop-laravel/license)](https://packagist.org/packages/monii/container-interop-laravel)
<br>
[![Build Status](https://travis-ci.org/monii/monii-container-interop-laravel.svg?branch=master)](https://travis-ci.org/monii/monii-container-interop-laravel)


Requirements
------------

 * PHP 5.5+
 * illuminate/contracts ^5.0


Installation
------------

```bash
$> composer require monii/container-interop-laravel
```


Usage
-----

```php
use Illuminate\Container\Container;
use Monii\Interop\Container\Laravel\LaravelContainer;

$actualLaravelContainer = new Container();
$container = new LaravelContainer($actualLaravelContainer);

// $container implements Interop\Container\ContainerInterface
```

Service Provider
-----

In your application configuration add `Monii\Interop\Container\Laravel\ServiceProvidre` to your `providers` array.

```php
$container = App::make('Interop\Container\ContainerInterface');
```

License
-------

MIT, see LICENSE.


Community
---------

Want to get involved? Here are a few ways:

 * Find us in the #monii IRC channel on irc.freenode.org.
 * Mention [@moniidev](https://twitter.com/moniidev) on Twitter.
