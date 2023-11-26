
# Laravel Jikan

A Laravel Package for consuming [Jikan](https://jikan.moe/) API (currently v4).

## Installation


```
composer require eliabrian/laravel-jikan
```

## Usage

All of the models implemetation are pretty much the same (Anime, Manga, Characters, etc).

### Searching
```php
use Eliabrian\LaravelJikan\Facades\Anime;

$results = Anime::search([
    'q' => 'Demon Slayer',
    'type' => 'tv',
    'sfw' => true,
    'limit' => 1,
])->get();
```
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
> Type for different model might be differ. For more types you can look it up in [Jikan Docs](https://docs.api.jikan.moe/).

### Get random
```php
use Eliabrian\LaravelJikan\Facades\Anime;
use Eliabrian\LaravelJikan\Facades\Manga;

$randomAnimes = Anime::random()->get();
$randomMangas = Manga::random()->get();
```

### Get Top
```php
use Eliabrian\LaravelJikan\Facade\Anime;

$topAnimes = Anime::top()->get();

// You can also add query parameters into it:
$topUpcomingAnimes = Anime::top([
    'type' => 'tv',
    'filter' => 'upcoming',
    'limit' => '5',
])->get();
```
