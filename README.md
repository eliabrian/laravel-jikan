# Laravel Jikan
A Laravel Package for consuming [Jikan](https://jikan.moe/) API (currently v4).
## Installation
Install it using
```
composer require eliabrian/laravel-jikan
```
## Usage
All of the models implemetation are pretty much the same (Anime, Manga, Characters, etc).
### Anime
```php
use Eliabrian\LaravelJikan\Facades\Anime;

/**
 * Search Anime by params
 * you can look at the available params at the Jikan docs
 */
$params = [
    'q' => 'Demon Slayer',
    'type' => 'tv',
    'sfw' => true,
    'limit' => 1,
];
$anime = Anime::search($params)->get();

// Get Anime by ID
$anime = Anime::id(20)->get();

/**
 * Get Anime with Details (type)
 * You can see the details list in the documentation
 * e.g. "characters", "episodes", "news", etc
 */
$anime = Anime::id(20)->type('pictures')->get();
```

### Manga
```php
use Eliabrian\LaravelJikan\Facades\Manga;

/**
 * Search Manga by params
 * you can look at the available params at the Jikan docs
 */
$params = [
    'q' => 'Monster',
    'type' => 'manga',
    'sfw' => true,
    'limit' => 1,
];
$manga = Manga::search($params)->get();

// Get Manga by ID
$manga = Manga::id(1)->get();

/**
 * Get Manga with Details (type)
 * You can see the details list in the documentation
 * e.g. "characters", "topics", "news", etc
 */
$manga = Manga::id(20)->type('characters')->get();
```