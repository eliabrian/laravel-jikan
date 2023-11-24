
# Laravel Jikan

A Laravel Package for consuming [Jikan](https://jikan.moe/) API (currently v4).

## Installation


```
composer require eliabrian/laravel-jikan
```

## Usage

All of the models implemetation are pretty much the same (Anime, Manga, Characters, etc).

### Get by ID

```php
use Eliabrian\LaravelJikan\Facades\Anime;

$anime = Anime::id(20)->get();
```
### Get details using type
```php
use Eliabrian\LaravelJikan\Facades\Anime;

$animeCharacters = Anime::id(20)->type('characters')->get();
$animePictures = Anime::id(20)->type('pictures')->get();
```
> **_NOTE:_** Type for different model might be differ. For more types you can look it up in [Jikan Docs](https://docs.api.jikan.moe/).
### Get random
```php
use Eliabrian\LaravelJikan\Facades\Random;

$randomAnimes = Random::anime()->get();
$randomAnimes = Random::manga()->get();
```
