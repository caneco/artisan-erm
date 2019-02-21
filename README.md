<p align="center"><img src="https://raw.githubusercontent.com/caneco/artisan-erm/master/art/logo.jpg" width="300" height="300" />
</p><br>

<p align="center"><img src="https://raw.githubusercontent.com/caneco/artisan-erm/master/art/preview.gif" width="680"/></p>


<p align="center">
<a href="https://packagist.org/packages/caneco/artisan-erm"><img src="https://poser.pugx.org/caneco/artisan-erm/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/caneco/artisan-erm"><img src="https://poser.pugx.org/caneco/artisan-erm/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/caneco/artisan-erm"><img src="https://poser.pugx.org/caneco/artisan-erm/license.svg" alt="License"></a>
</p>


---

# Laravel Artisan, Erm...

Are you tired of trying to call an Artisan command and endup with this result?

```
Command "migrate:make" is not defined.
Did you mean one of these?
    migrate
    migrate:fresh
    migrate:install
```

To make your life easier, Erm...better install this package.


## Instalation

You can install the package via composer:

```
>_ composer require caneco/artisan-erm
```

#### Registering the service provider
In Laravel 5.5 the service provider will automatically get registered. But if needed just add the service provider in `config/app.php` file:

```
'providers' => [
    // ...
    Caneco\ArtisanErm\ArtisanErmServiceProvider::class,
];
```

#### Publishing the configuration file
To publish configuration file execute the following command and pick the package Service Provider:

```
>_ php artisan vendor:publish

 Which provider or tag's files would you like to publish?:
  [0 ] Publish files from all providers and tags listed below
  [1 ] Provider: Caneco\ArtisanErm\ArtisanErmServiceProvider
  [… ] ...
```

Or do it in a single command:

```
>_ php artisan vendor:publish --provider="Caneco\ArtisanErm\ArtisanErmServiceProvider"
```

When published, you will have a config file with the list of Erm...commands avaiable:

```PHP
return [

  'list' => [
    /*
    |--------------------------------------------------------------------------
    | Erm...this is the awkward list of Cache commands
    |--------------------------------------------------------------------------
    */
    'cache' => [
      'clear'  => 'Flush the application cache',
      'forget' => 'Remove an item from the cache',
      'table'  => 'Create a migration for the cache database table',
    ],

    // ...
];
```



## Usage

After the initial setup. Erm...commands are ready to use right from your Laravel artisan command.

```
$ php artisan list
...
Available commands:
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  ...
  erm
   erm:cache           Erm...show all the commands in the `cache` namespace.
   erm:config          Erm...show all the commands in the `config` namespace.
   erm:make            Erm...show all the commands in the `make` namespace.
   erm:migrate         Erm...show all the commands in the `migrate` namespace.
   erm:queue           Erm...show all the commands in the `queue` namespace.
   erm:route           Erm...show all the commands in the `route` namespace.
   erm:schedule        Erm...show all the commands in the `schedule` namespace.
   erm:view            Erm...show all the commands in the `view` namespace.
  ...
```

Then you can call any Erm...commands and all the available choices will be presented for you to choose.

```
$ php artisan erm:cache

 Erm...which command would you like to call:
  [0] artisan cache:clear    Flush the application cache
  [1] artisan cache:forget   Remove an item from the cache
  [2] artisan cache:table    Create a migration for the cache database table
 >
...
```

Or you can directly call the main Erm...command and it will awkwardly list top commands.

```
$ php artisan erm

 Erm...which command would you like to call:
  [0] artisan cache:_
  [1] artisan config:_
  [2] artisan migrate:_
```

With this, it's a walk in the park to call any ambiguous command.


#### Discover new namespaces

By default the listed Erm...commands will be according to a fresh new Laravel app.

But if your current application already other big command namespaces like `horizon:` you can rebuild the list using the following option:

```
$ php artisan erm --discover
```

Erm...will check the list of Artisan commands in your Laravel application and map a new `erm.php` config according to that.

The next time you call the base Erm...command the new options will be available.

```
$ php artisan erm

 Erm...which command would you like to call?:
  [0] artisan cache:_
  [1] artisan horizon:_
  […]
```



## What is Erm?
According to the Urban Dictionary, the term "[Erm](https://www.urbandictionary.com/define.php?term=erm)" it's a word used commonly to fill awkward space in conversations. It felt right since you can end up with some awkwardly results with Artisan.




## Gotchas ⚠️

- Only the options that have more than 1 (one) namespace will be listed
- After you rebuild the list from `artisan erm --discover` the `erm.php` config it's not going to be that pretty anymore.




## Supported versions

Look at the table below to find out what versions of Laravel are supported on what version of this package:

Laravel Framework | Artisan Erm
:--- | :---
`5.7.*` | `^1.0`




## Contributing

All contributions (pull requests, issues and feature requests) are welcome. Make sure to read through the [Contributing file](/caneco/artisan-erm/blob/master/CONTRIBUTING.md) first, though. See the [contributors page](/caneco/artisan-ermes/graphs/contributors) for all contributors.




## License

The MIT License (MIT). Please see [License File](/caneco/artisan-erm/blob/master/LICENSE.md) for more information.
